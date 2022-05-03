[![Test](https://github.com/snow-actions/composite-action-template/actions/workflows/test.yml/badge.svg)](https://github.com/snow-actions/composite-action-template/actions/workflows/test.yml)

# PHP AST Changed

Check if PHP AST have been changed in a pull request.

## Usage

See [action.yml](action.yml)

```yml
steps:
  - uses: snow-actions/php-ast-changed@v1.0.0
    id: php-ast
  - name: Label
    run: |
      set -x
      label='needless-debug'
      if [ "${changed}" = 'false' ]; then
        gh pr edit ${{ github.event.number }} --add-label ${label}
      else
        gh pr edit ${{ github.event.number }} --remove-label ${label}
      fi
    env:
      changed: ${{ steps.php-ast.outputs.changed }}
```

## Inputs

| Name | Description | Default | Required |
| - | - | - | - |
| `php-version` | PHP version https://github.com/shivammathur/setup-php#tada-php-support | `8.1` | no |
| `ast-version` | AST version https://github.com/nikic/php-ast#ast-versioning | `85` | no |

## Outputs

| Name | Type | Description |
| - | - | - |
| `changed` | string | AST of \*.php files have changed: "true", not changed: "false" |

## Supported

### Runners

- `ubuntu-20.04`
- `ubuntu-18.04`
- `windows-2022`
- `windows-2019`
- `macos-11`
- `macos-10.15`
- `self-hosted`

### Events

- `pull_request`
- `pull_request_target`

## Dependencies

- [actions/checkout](https://github.com/actions/checkout) >= 3.0.0

## Contributing

Welcome.
