# List of banned stuff

* Anything that isn't [OTBS indentation style](https://en.wikipedia.org/wiki/Indentation_style#Variant:_1TBS_(OTBS)) (Allman, GNU, etc).
* Omitting brackets when they can be used.
* Any language other than PHP, HTML or SQL.
* Anything other than lower camelCase for functions and variables.
* Anything other than upper CamelCase for class/struct names or enum values.

* `switch` cases that don't create a new scope.
* Using the tertiary operator without using its return value.

* Tabs & indentations other than multiples of 4 spaces.
* Anything other than LF newlines.
* Text/source files without a newline at the end.
* Declaring several variables in one statement.

* Omitting parameter types or return types on functions.
* Omitting `()` on function calls.
* The `mixed` type.
* Using `"` over `'` for literal strings.
