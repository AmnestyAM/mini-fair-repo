#!/bin/bash
set -e

PLUGIN_NAME="mini-fair"
OUTPUT_DIR="build"
ZIP_FILE="$OUTPUT_DIR/${PLUGIN_NAME}.zip"

# Clean previous build
rm -rf "$OUTPUT_DIR"
mkdir -p "$OUTPUT_DIR"

# List files and directories to include in the zip
INCLUDES=(
  plugin.php
  composer.json
  composer.lock
  inc
  vendor
  readme.txt
)

# Create the zip
zip -r "$ZIP_FILE" "${INCLUDES[@]}" -x "*.git*" "*.github*" "tests/*" "build/*"

echo "Created $ZIP_FILE"
