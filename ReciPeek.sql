CREATE VIEW v_ingredient_usage AS
SELECT 
  ing.id AS ingredient_id,
  ing.ingredient_name,
  COUNT(ri.id_recipe) AS recipe_count
FROM 
  ingredients ing
LEFT JOIN recipes_ingredients ri ON ing.id = ri.id_ingredient
GROUP BY 
  ing.id;