#!/bin/bash

# List of view names
views=(
    "dashboard"
    "wallet"
    "transaction-history"
    "settings"
    "profile"
    "security"
    "help-support"
    "promotions"
)

# Directory to save views
views_directory="resources/views"

# Loop through the view names and create files
for view in "${views[@]}"; do
    content='<x-app-layout />'$'\n'"<!-- Your content for $view here -->"

    filename="$view.blade.php"
    full_path="$views_directory/$filename"

    if [ ! -f "$full_path" ]; then
        echo "$content" > "$full_path"
        echo "View created: $filename"
    else
        echo "View already exists: $filename"
    fi
done

echo "Views generation completed."
