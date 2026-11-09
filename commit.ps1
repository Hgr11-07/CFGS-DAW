# Custom Commit Message Generator

```powershell
# Get staged changes
$diff = git diff --staged

# Determine commit type based on diff content
$type = 'feat'
if ($diff -match 'fix') {
    $type = 'fix'
} elseif ($diff -match 'refactor') {
    $type = 'refactor'
} else {
    $type = 'chore'
}

# Generate summary from first line of diff
$summary = $diff -split "\n" | Select-Object -First 1
$message = "$type: $summary"

# Commit with generated message
git commit -m "$message"
```
