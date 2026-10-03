# Wikepage 2007.2 Opus 13 "Landauer-Büttiker"

[![PHP Version](https://img.shields.io/badge/PHP-Engine-777BB4.svg?logo=php&logoColor=white)](https://www.php.net/)
[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html)

**Wikepage** is a lightweight, easy-to-use Wiki/Blog hybrid engine derived from [Tipiwiki2](http://tipiwiki.sourceforge.net/). It enhances the base project with critical security patches, structure password protection, RSS feed import/export, HTML tables, file uploads, and native multi-language/multi-site support.

---

## Operating Modes

- **Wiki Mode:** Allows open editing across pages and blog entries without password prompts.
- **Personal Mode:** Restricts all page and blog edits behind password authentication.

---

## Installation

1. **Configuration:** Open `index.php` in a text editor to set site metadata, language options, and environment variables.
2. **Deployment:** Upload all core files to your target web directory via FTP.
3. **Permissions:** Set permissions (`chmod 777` or `755`) recursively on the `data/` directory and all its subfolders.
4. **Environment Check:** Ensure PHP `safe_mode` is **disabled** (`safe_mode = Off`). Wikepage cannot create files dynamically if `safe_mode` is enabled.
5. **Localization:**
   - Download additional language packs from `http://www.wikepage.org/` and extract them into the root directory.
   - Set the default language variable in `index.php`.
   - Enable inline language switching using query strings:
     ```text
     [index.php?lng=en|English]
     [index.php?lng=tr|Türkçe]
     ```
6. **First Run & Setup:**
   - Access your domain via browser. You will be redirected to the **Admin** panel.
   - Set the administrator password immediately to complete initialization.

---

## Usage Notes

- **Blog Integration:** Submit new entries through the Admin panel or via `[index.php?Blog_Entry|Submit]` syntax.
- **Render Blog Feed:** Embed `<blog_view>` inside any page to render the active blog feed.
- **Troubleshooting:**
  - File generation, upload, and deletion functions strictly depend on directory write permissions (`chmod`).
  - PHP `safe_mode=On` will break file system write operations.

---

## License

Wikepage is open-source software distributed under the terms of the **GNU General Public License (GPL v2)**.  
For full licensing terms, visit [gnu.org/licenses/old-licenses/gpl-2.0.html](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html).
