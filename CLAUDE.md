# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

Public GitHub repository for Planning Center API developer support. Serves as the issue tracker for external developers using the Planning Center API. Includes AI-powered GitHub Actions for automated issue triage using the Anthropic SDK.

## Project Structure

```
.github/
  scripts/          GitHub Actions scripts (Node.js)
    detect-duplicates.js   AI-powered duplicate issue detection
    label-product.js       AI-powered product label assignment
  workflows/
    issue-triage.yml       Triggers triage on new issue creation
  ISSUE_TEMPLATE/   Issue templates for bug reports, feature requests, questions
guides/             Integration guides for external developers
```

## Essential Commands

- `npm ci` - Install dependencies
- `node .github/scripts/detect-duplicates.js` - Run duplicate detection locally
- `node .github/scripts/label-product.js` - Run product labeling locally

## Development Practices

- Set `DRY_RUN=true` when testing scripts locally to avoid posting to GitHub
- Both triage scripts require `ANTHROPIC_API_KEY` and `GITHUB_TOKEN` env vars
- Model selection is configurable via `LABELING_MODEL` and `DUPLICATE_DETECTION_MODEL` env vars; defaults are in each script
- Valid product labels are defined at the top of `label-product.js` — update there when PCO products change
