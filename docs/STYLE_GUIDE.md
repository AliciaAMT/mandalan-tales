# Mandalan Tales Style Guide

## Table of Contents

1. [Introduction](#introduction)
2. [Code Style](#code-style)

   * [Indentation](#indentation)
   * [Variable Naming](#variable-naming)
   * [Function Naming](#function-naming)
   * [Comments](#comments)
3. [Documentation](#documentation)

   * [README](#readme)
   * [Code Comments](#code-comments)
4. [UI/UX Guidelines](#uiux-guidelines)

   * [Component Libraries](#component-libraries)
   * [Color Palette](#color-palette)
   * [Typography](#typography)
   * [Layout](#layout)
5. [File Structure](#file-structure)
6. [Version Control](#version-control)

   * [Branch Naming](#branch-naming)
   * [Commit Messages](#commit-messages)
7. [Contributing Guidelines](#contributing-guidelines)
8. [Contact Information](#contact-information)

## Introduction

The Mandalan Tales Style Guide outlines the conventions and best practices to be followed by contributors to ensure a consistent and well-maintained project.

## Code Style

### Indentation

* Use four spaces for indentation.
* Avoid using tabs for indentation.

### Variable Naming

* Follow camelCase for variable names (e.g., `playerScore`).
* Use meaningful and descriptive names.

### Function Naming

* Use camelCase for function names (e.g., `calculateScore`).
* Use verbs to describe actions performed by functions.

### Comments

* Use comments sparingly and focus on explaining complex logic or providing context.
* Ensure comments are concise and add value to the understanding of the code.

## Documentation

### README

* Keep the README up-to-date with project information, installation instructions, usage guidelines, and any other relevant details.
* Include badges for build status, code coverage, etc., if applicable.

### Code Comments

* Document complex algorithms or sections of code to enhance readability.
* Avoid unnecessary comments that only repeat what the code is doing.

## UI/UX Guidelines

### Component Libraries

* Use **Angular Material** for desktop/PWA UIs and structured components such as toolbars, dialogs, and forms.
* Use **Ionic Components** for mobile-optimized views and native-like behaviors (e.g., `ion-header`, `ion-button`, `ion-content`).
* Avoid mixing Ionic and Material components within the same parent unless required for layout.
* Ensure accessibility is preserved when combining components from both libraries.

### Color Palette

* Follow the theme settings defined via Angular Material's SCSS theming system.
* Ensure sufficient color contrast for readability and accessibility.
* Default palette: primary = deep purple, accent = amber (can be customized).

### Typography

* Use Angular Material's typography configuration for a consistent typographic scale.
* Ensure readable font sizes and adequate spacing for all viewports.

### Layout

* Use Angular Material's Flex Layout or CSS Grid for responsive layout.
* Maintain a consistent grid rhythm across components.
* Follow mobile-first design principles for best performance on all devices.

## File Structure

* Organize project files logically into folders based on functionality (e.g., `components/`, `services/`, `pages/`).
* Avoid unnecessary nesting of folders.
* Prefer feature modules to keep code modular and maintainable.

## Version Control

### Branch Naming

* Use meaningful names for branches that reflect the purpose of the changes (e.g., `feature/character-creation`, `bugfix/dialog-not-closing`).

### Commit Messages

* Write clear and concise commit messages that explain the purpose of the changes.
* Format: `type(scope): message`, e.g., `feat(profile): add character stats view`

## Contributing Guidelines

* Refer to the [CONTRIBUTING.md](CONTRIBUTING.md) file for guidelines on submitting contributions.
* Follow the outlined process for reporting issues and submitting pull requests.

## Contact Information

For any questions or concerns related to the style guide, please contact \[Project Maintainer or Team Lead].
