# AI Product Descriptor

Upload a product image and instantly generate captions, tags, descriptions, SEO meta, and alt text — powered by AI via OpenRouter.

Built as a portfolio project. Clean, minimal single-page app with no frameworks.

![Preview](preview.png)

## Features

- 📸 Upload product image (click or drag & drop)
- ✅ Toggle which outputs to generate (Caption, Tags, Description, SEO Meta, Alt Text)
- 🌐 Output language: English or Indonesian
- ✏️ Edit results before copying — tags as removable chips, text as editable fields
- 📋 Copy per-section
- 🔑 Optional: use your own OpenRouter API key (stored in browser only, never sent to server)
- 🔒 Default key kept server-side via `.env`, never exposed to client

## Tech Stack

- Frontend: HTML, CSS, Vanilla JS (no frameworks)
- Backend: PHP (proxy to hide default API key)
- AI: [OpenRouter](https://openrouter.ai) — model `openrouter/free` (auto-selects best free vision model)
- Deploy: [InfinityFree](https://infinityfree.net) or any PHP host

## Setup

### 1. Clone the repo

```bash
git clone https://github.com/yourusername/ai-product-descriptor.git
cd ai-product-descriptor
```

### 2. Create your `.env`

```bash
cp .env.example .env
```

Edit `.env` and fill in your OpenRouter key:

```
OPENROUTER_API_KEY=sk-or-v1-xxxxxxxx
OPENROUTER_MODEL=openrouter/free
```

Get a free key at [openrouter.ai](https://openrouter.ai) — no credit card required.

### 3. Upload to InfinityFree (or any PHP host)

Upload all files to `/htdocs`:
- `index.html`
- `api.php`
- `config.php`
- `.env` ← **do not skip this, keep it private**

`.env` is listed in `.gitignore` so it won't be pushed to Git.

## How the API key flow works

| Situation | What happens |
|---|---|
| Visitor has no key | Request goes through `api.php` using your default key from `.env` |
| Visitor pastes their own key | Request goes directly to OpenRouter client-side — your key is never used |

User keys are stored only in their browser's `localStorage` and never sent to your server.

## Model

Default: `openrouter/free` — OpenRouter's auto-router that picks the best available free vision model automatically. Future-proof: no hardcoded model name to update.

Alternative free vision models (set in `.env`):
- `google/gemma-4-31b-it:free`
- `nvidia/nemotron-nano-12b-v2-vl:free`

## License

MIT
