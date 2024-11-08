A minimal single-file PHP wiki using simple syntax, responsive design, password protection, no database/dependency. Based on WikWiki.

Default password ($P) is admin, but change it using https://bcrypt-generator.com/

**Syntax:**
1. Title: new line with 1 to 6 #
2. Italic: word(s) with one * before and after
3. Bold: word(s) with two * before and after
4. Unordered list: new line with * and a space
5. Ordered list: new line with a digit, a dot and a space
6. Quote: new line with > and a space
7. Link: [ [page] ] or [name] (?page) without space for internal,  [page] (URL) without space for external.
8. Image: ![img text] (path or URL) without space
9. Horizontal line: new line with ---
10. Note: new line with !!! and a space

**You can:**
* Delete a page by deleting the content and saving.
* Go in edit mode and save with [accesskey](https://en.wikipedia.org/wiki/Access_key)+*e*.
* Create a table of content manually with anchored h3 titles ([example](?e=budget)).

**Know issue**
* Multi-word [[Page link]] and saving the content will keep only the first word.
