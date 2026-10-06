/* =============================================================
   A2Z RIDERS HUB — Contact page
   -------------------------------------------------------------
   Populates the category select and composes the enquiry into a
   WhatsApp message. There is no backend: the form hands off to
   WhatsApp rather than pretending to have submitted anything.
   ============================================================= */

(function () {
  "use strict";

  const $ = (s) => document.querySelector(s);

  function fillCategories() {
    const select = $("#f-cat");
    if (!select) return;
    select.innerHTML =
      '<option value="">Select a category</option>' +
      SITE.CATEGORIES.map(
        (c) => '<option value="' + c.id + '">' + window.A2Z.escapeHtml(c.name) + "</option>"
      ).join("") +
      '<option value="other">Something else</option>';
  }

  function initForm() {
    const form = $("#enquiry");
    if (!form) return;
    const status = $("#form-status");

    form.addEventListener("submit", (e) => {
      e.preventDefault();

      /* NOTE: read through form.elements — `form.name` resolves to
         HTMLFormElement's own name IDL property, not the input. */
      const fields = form.elements;
      const name = fields.name.value.trim();
      const phone = fields.phone.value.trim();
      const category = fields.category.value;
      const size = fields.size.value.trim();
      const message = fields.message.value.trim();

      /* let native validation speak first (form is novalidate, so we ask) */
      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }

      if (!name || !phone) {
        const first = !name ? fields.name : fields.phone;
        first.focus();
        return;
      }

      const catLabel =
        category === "other"
          ? "Something else"
          : category
          ? (SITE.categoryById(category) || { name: category }).name
          : "Not specified";

      const lines = [
        "Hello A2Z Riders Hub,",
        "",
        "Name: " + name,
        "Phone: " + phone,
        "Category: " + catLabel,
      ];

      if (size) lines.push("Size / Model: " + size);
      if (message) lines.push("", message);

      lines.push("", "Sent from the A2Z Riders Hub website.");

      const url =
        "https://wa.me/" +
        SITE.CONTACT.whatsapp +
        "?text=" +
        encodeURIComponent(lines.join("\n"));

      if (status) status.classList.add("is-visible");
      window.open(url, "_blank", "noopener");
    });
  }

  function boot() {
    fillCategories();
    initForm();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();
