<?php

function isValidRecipe(array $recipe): bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        return $recipe['is_enabled'];
    } else {
        return false;
    }
}

function getRecipes(array $recipes): array
{
    $validRecipes = [];

    foreach ($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }

    return $validRecipes;
}

function displayAuthor(string $authorEmail, array $users): string 
{
  foreach ($users as $user) {
    if ($authorEmail === $user['email']) {
      return $user['full_name'] . '(' . $user['age'] . ' ans)';
    }
  } return 'inconnu';
}
?>