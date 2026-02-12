const Anthropic = require("@anthropic-ai/sdk");
const core = require("@actions/core");
const github = require("@actions/github");

const VALID_PRODUCT_LABELS = [
  "API",
  "Calendar",
  "Check-Ins",
  "Giving",
  "Groups",
  "Home",
  "People",
  "Publishing",
  "Registrations",
  "Resources",
  "Services",
  "Webhooks",
];

const MODEL = process.env.LABELING_MODEL || "claude-haiku-4-5-20251001";

async function identifyProduct(client, issueTitle, issueBody) {
  const response = await client.messages.create({
    model: MODEL,
    max_tokens: 256,
    system: `You are a triage assistant for Planning Center's developer API support.

Given a GitHub issue, identify which Planning Center product it relates to.

Valid product labels: ${VALID_PRODUCT_LABELS.join(", ")}

Rules:
- Return EXACTLY one product label from the list above, matching the exact casing and punctuation.
- Base your decision on the issue title, body, mentioned API endpoints, and context clues.
- If the issue clearly relates to one product, return that product.
- If the issue is about general API usage, authentication (OAuth, tokens), or you cannot confidently determine a single product, return "UNKNOWN".
- Do NOT guess if you are unsure. Return "UNKNOWN" instead.

Respond with ONLY the product label or "UNKNOWN". No explanation, no extra text.`,
    messages: [
      {
        role: "user",
        content: `Issue title: ${issueTitle}\n\nIssue body:\n${issueBody}`,
      },
    ],
  });

  return response.content[0].text.trim();
}

async function run() {
  const anthropicApiKey = process.env.ANTHROPIC_API_KEY;
  if (!anthropicApiKey) {
    core.setFailed("ANTHROPIC_API_KEY is not set");
    return;
  }

  const token = process.env.GITHUB_TOKEN;
  if (!token) {
    core.setFailed("GITHUB_TOKEN is not set");
    return;
  }

  const issue = github.context.payload.issue;
  if (!issue) {
    core.setFailed("This action must be triggered by an issue event");
    return;
  }

  const issueTitle = issue.title || "";
  const issueBody = issue.body || "";
  const issueNumber = issue.number;

  core.info(`Analyzing issue #${issueNumber}: "${issueTitle}"`);
  core.info(`Using model: ${MODEL}`);

  const anthropic = new Anthropic({ apiKey: anthropicApiKey });
  const octokit = github.getOctokit(token);
  const { owner, repo } = github.context.repo;

  const product = await identifyProduct(anthropic, issueTitle, issueBody);
  core.info(`Claude identified product: "${product}"`);

  const labelsToApply = [];

  if (product === "UNKNOWN" || !VALID_PRODUCT_LABELS.includes(product)) {
    core.info("Product could not be determined — applying fallback labels");
    labelsToApply.push("API", "needs-triage");
  } else {
    labelsToApply.push(product);
  }

  core.info(`Applying labels: ${labelsToApply.join(", ")}`);

  await octokit.rest.issues.addLabels({
    owner,
    repo,
    issue_number: issueNumber,
    labels: labelsToApply,
  });

  core.info("Labels applied successfully");
}

run().catch((error) => {
  core.setFailed(`Action failed: ${error.message}`);
});
