# STYLE\_GUIDE

## Mandalan Tales Style Guide

### Table of Contents

1. [Introduction](STYLE_GUIDE.md#introduction)
2. [Code Style](STYLE_GUIDE.md#code-style)
   * [Indentation](STYLE_GUIDE.md#indentation)
   * [Variable Naming](STYLE_GUIDE.md#variable-naming)
   * [Function Naming](STYLE_GUIDE.md#function-naming)
   * [Comments](STYLE_GUIDE.md#comments)
3. [Documentation](STYLE_GUIDE.md#documentation)
   * [README](STYLE_GUIDE.md#readme)
   * [Code Comments](STYLE_GUIDE.md#code-comments)
4. [UI/UX Guidelines](STYLE_GUIDE.md#uiux-guidelines)
   * [Accessibility](STYLE_GUIDE.md#accessibility)
   * [Component Libraries](STYLE_GUIDE.md#component-libraries)
   * [Color Palette](STYLE_GUIDE.md#color-palette)
   * [Typography](STYLE_GUIDE.md#typography)
   * [Layout](STYLE_GUIDE.md#layout)
5. [File Structure](STYLE_GUIDE.md#file-structure)
6. [Version Control](STYLE_GUIDE.md#version-control)
   * [Branch Naming](STYLE_GUIDE.md#branch-naming)
   * [Commit Messages](STYLE_GUIDE.md#commit-messages)
7. [Contributing Guidelines](STYLE_GUIDE.md#contributing-guidelines)
8. [Contact Information](STYLE_GUIDE.md#contact-information)

### Introduction

The Mandalan Tales Style Guide outlines the conventions and best practices to be followed by contributors to ensure a consistent and well-maintained project.

### Code Style

#### Indentation

* Use four spaces for indentation.
* Avoid using tabs for indentation.

#### Variable Naming

* Follow camelCase for variable names (e.g., `playerScore`).
* Use meaningful and descriptive names.

#### Function Naming

* Use camelCase for function names (e.g., `calculateScore`).
* Use verbs to describe actions performed by functions.

#### Comments

* Use comments sparingly and focus on explaining complex logic or providing context.
* Ensure comments are concise and add value to the understanding of the code.

### Documentation

#### README

* Keep the README up-to-date with project information, installation instructions, usage guidelines, and any other relevant details.
* Include badges for build status, code coverage, etc., if applicable.

#### Code Comments

* Document complex algorithms or sections of code to enhance readability.
* Avoid unnecessary comments that only repeat what the code is doing.

### UI/UX Guidelines

#### Accessibility

## Accessibility & Voice Navigation Style Guide

### Purpose

This section defines accessibility and voice control standards for all contributors to the Mandalan Tales project. It ensures that all pages are usable by:

* Screen reader users
* Voice navigation users (Dragon, Google Voice Access, etc.)
* Keyboard-only and assistive tech users

Accessibility is not an afterthought — it is part of our **design style**.

***

### General Rules

#### 1. Unique Labels for Interactive Elements

* Every clickable/tappable element (buttons, links, form inputs) must have **a unique visible label per page**.
* Do not reuse labels like "Submit" or "Click here" more than once on the same screen.
* Remember that header and footer links are always visible — they count!

**✅ Good:**

```html
<ion-button>Create Account</ion-button>
```

**❌ Avoid:**

```html
<ion-button>Submit</ion-button>
<ion-button>Submit</ion-button>
```

***

#### 2. Match `aria-label` to Visible Text

Voice users say what they see. Use `aria-label` only to reinforce clarity, not to replace text.

**✅ Good:**

```html
<ion-button aria-label="Create Account">Create Account</ion-button>
```

**❌ Avoid:**

```html
<ion-button aria-label="Register">Create</ion-button>
```

***

#### 3. Use `aria-describedby` for Errors

Link error messages to their inputs or to the submit button.

```html
<ion-text id="form-error" role="alert">Password is required.</ion-text>
<ion-input aria-describedby="form-error"></ion-input>
```

***

#### 4. Avoid Vague Link Text

* Links must be descriptive.
* Never use "Click here" or "More."

**✅ Good:** `View Inventory`\
&#xNAN;**❌ Bad:** `Click here`

***

#### 5. All Forms Must Include Skip Link and Landmark Role

```html
<a href="#main-content" class="skip-link">Skip to main content</a>
<div id="main-content" role="main">
  <!-- Main content or form starts here -->
</div>
```

***

#### 6. Label CAPTCHA Containers Clearly

Wrap your reCAPTCHA widget in a labeled region so voice users know what it is.

```html
<div role="group" aria-label="Robot check">
  <div class="g-recaptcha" data-sitekey="..."></div>
</div>
```

***

### Voice Navigation Notes

* All `aria-label`s must match visible text for reliable voice control.
* Do **not** depend on "Show Numbers" overlays — these are inconsistent on desktop.
* Do **not** use duplicate button labels anywhere in the same visual page area.
* Avoid modals or stacked actions with non-distinct labels (e.g. multiple "OK" buttons).

***

### Reminder

If you're unsure whether something is voice-friendly, try saying it out loud. If it feels awkward or vague, **label it better**.

All contributors must follow this guide for every page, form, and component added to Mandalan Tales.

#### Component Libraries

* Use **Angular Material** for desktop/PWA UIs and structured components such as toolbars, dialogs, and forms.
* Use **Ionic Components** for mobile-optimized views and native-like behaviors (e.g., `ion-header`, `ion-button`, `ion-content`).
* Avoid mixing Ionic and Material components within the same parent unless required for layout.
* Ensure accessibility is preserved when combining components from both libraries.

#### Color Palette

* Follow the theme settings defined via Angular Material's SCSS theming system.
* Ensure sufficient color contrast for readability and accessibility.
* Default palette: primary = deep purple, accent = amber (can be customized).

#### Typography

* Use Angular Material's typography configuration for a consistent typographic scale.
* Ensure readable font sizes and adequate spacing for all viewports.

#### Layout

* Use Angular Material's Flex Layout or CSS Grid for responsive layout.
* Maintain a consistent grid rhythm across components.
* Follow mobile-first design principles for best performance on all devices.

### File Structure

* Organize project files logically into folders based on functionality (e.g., `components/`, `services/`, `pages/`).
* Avoid unnecessary nesting of folders.
* Prefer feature modules to keep code modular and maintainable.

### Version Control

#### Branch Naming

* Use meaningful names for branches that reflect the purpose of the changes (e.g., `feature/character-creation`, `bugfix/dialog-not-closing`).

#### Commit Messages

* Write clear and concise commit messages that explain the purpose of the changes.
* Format: `type(scope): message`, e.g., `feat(profile): add character stats view`

### Contributing Guidelines

* Refer to the [CONTRIBUTING.md](CONTRIBUTING.md) file for guidelines on submitting contributions.
* Follow the outlined process for reporting issues and submitting pull requests.

### Contact Information

For any questions or concerns related to the style guide, please contact \[Project Maintainer or Team Lead].
