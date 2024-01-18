/*
 Navicat Premium Data Transfer

 Source Server         : ReciPeek
 Source Server Type    : PostgreSQL
 Source Server Version : 160001 (160001)
 Source Host           : localhost:5433
 Source Catalog        : database
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 160001 (160001)
 File Encoding         : 65001

 Date: 18/01/2024 14:36:09
*/


-- ----------------------------
-- Sequence structure for User_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."User_id_seq";
CREATE SEQUENCE "public"."User_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 1000
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for cuisine_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."cuisine_id_seq";
CREATE SEQUENCE "public"."cuisine_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for diet_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."diet_id_seq";
CREATE SEQUENCE "public"."diet_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for difficulty_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."difficulty_id_seq";
CREATE SEQUENCE "public"."difficulty_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for ingredient_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."ingredient_id_seq";
CREATE SEQUENCE "public"."ingredient_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for instruction_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."instruction_id_seq";
CREATE SEQUENCE "public"."instruction_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for meal_type_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."meal_type_id_seq";
CREATE SEQUENCE "public"."meal_type_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for nutrition_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."nutrition_id_seq";
CREATE SEQUENCE "public"."nutrition_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for recipe_ingredient_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."recipe_ingredient_id_seq";
CREATE SEQUENCE "public"."recipe_ingredient_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for recipes_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."recipes_id_seq";
CREATE SEQUENCE "public"."recipes_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for cuisine
-- ----------------------------
DROP TABLE IF EXISTS "public"."cuisine";
CREATE TABLE "public"."cuisine" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of cuisine
-- ----------------------------
INSERT INTO "public"."cuisine" OVERRIDING SYSTEM VALUE VALUES (1, 'asian');
INSERT INTO "public"."cuisine" OVERRIDING SYSTEM VALUE VALUES (2, 'chinese');
INSERT INTO "public"."cuisine" OVERRIDING SYSTEM VALUE VALUES (3, 'italian');
INSERT INTO "public"."cuisine" OVERRIDING SYSTEM VALUE VALUES (4, 'japanese');
INSERT INTO "public"."cuisine" OVERRIDING SYSTEM VALUE VALUES (5, 'mexican');
INSERT INTO "public"."cuisine" OVERRIDING SYSTEM VALUE VALUES (6, 'polish');
INSERT INTO "public"."cuisine" OVERRIDING SYSTEM VALUE VALUES (7, 'thai');

-- ----------------------------
-- Table structure for diet
-- ----------------------------
DROP TABLE IF EXISTS "public"."diet";
CREATE TABLE "public"."diet" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "type of diet" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of diet
-- ----------------------------
INSERT INTO "public"."diet" OVERRIDING SYSTEM VALUE VALUES (1, 'vegetarian');
INSERT INTO "public"."diet" OVERRIDING SYSTEM VALUE VALUES (2, 'gluten free');
INSERT INTO "public"."diet" OVERRIDING SYSTEM VALUE VALUES (3, 'vegan');
INSERT INTO "public"."diet" OVERRIDING SYSTEM VALUE VALUES (4, 'dairy free');
INSERT INTO "public"."diet" OVERRIDING SYSTEM VALUE VALUES (5, 'nut free');

-- ----------------------------
-- Table structure for difficulty
-- ----------------------------
DROP TABLE IF EXISTS "public"."difficulty";
CREATE TABLE "public"."difficulty" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "level" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of difficulty
-- ----------------------------
INSERT INTO "public"."difficulty" OVERRIDING SYSTEM VALUE VALUES (1, 'easy');
INSERT INTO "public"."difficulty" OVERRIDING SYSTEM VALUE VALUES (3, 'challenge');
INSERT INTO "public"."difficulty" OVERRIDING SYSTEM VALUE VALUES (2, 'more effort');

-- ----------------------------
-- Table structure for ingredients
-- ----------------------------
DROP TABLE IF EXISTS "public"."ingredients";
CREATE TABLE "public"."ingredients" (
  "id" int4 NOT NULL GENERATED BY DEFAULT AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "ingredient_name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of ingredients
-- ----------------------------
INSERT INTO "public"."ingredients" VALUES (2, 'bulka');
INSERT INTO "public"."ingredients" VALUES (3, 'mąka');
INSERT INTO "public"."ingredients" VALUES (4, 'mleko');
INSERT INTO "public"."ingredients" VALUES (5, 'woda');
INSERT INTO "public"."ingredients" VALUES (6, 'olive oil');
INSERT INTO "public"."ingredients" VALUES (7, ' pumpkin or squash (try kabocha), peeled, deseeded and chopped into chunks');
INSERT INTO "public"."ingredients" VALUES (8, 'vegetable stock or chicken stock');
INSERT INTO "public"."ingredients" VALUES (9, 'double cream');
INSERT INTO "public"."ingredients" VALUES (10, 'chilli flakes');
INSERT INTO "public"."ingredients" VALUES (11, 'pack extra-lean beef mince');
INSERT INTO "public"."ingredients" VALUES (12, 'grated parmesan');
INSERT INTO "public"."ingredients" VALUES (13, 'tomato ketchup');
INSERT INTO "public"."ingredients" VALUES (14, 'beef mince');
INSERT INTO "public"."ingredients" VALUES (15, 'tins plum tomatoes');
INSERT INTO "public"."ingredients" VALUES (16, 'dried oregano');
INSERT INTO "public"."ingredients" VALUES (17, 'tomato purée');
INSERT INTO "public"."ingredients" VALUES (18, 'red wine');
INSERT INTO "public"."ingredients" VALUES (19, 'parmesan grated, plus extra to serve');
INSERT INTO "public"."ingredients" VALUES (20, 'spaghetti');
INSERT INTO "public"."ingredients" VALUES (21, 'strong white bread flour, plus extra for dusting');
INSERT INTO "public"."ingredients" VALUES (22, 'instant yeast');
INSERT INTO "public"."ingredients" VALUES (23, 'olive oil, plus a drizzle');
INSERT INTO "public"."ingredients" VALUES (24, 'garlic cloves, crushed');
INSERT INTO "public"."ingredients" VALUES (25, 'passata');
INSERT INTO "public"."ingredients" VALUES (26, 'mozzarella pearls, halved');
INSERT INTO "public"."ingredients" VALUES (27, 'sushi rice');
INSERT INTO "public"."ingredients" VALUES (28, 'rice wine vinegar');
INSERT INTO "public"."ingredients" VALUES (29, 'golden caster sugar');
INSERT INTO "public"."ingredients" VALUES (30, 'mayonnaise');
INSERT INTO "public"."ingredients" VALUES (31, 'soy sauce');
INSERT INTO "public"."ingredients" VALUES (32, 'bag nori (seaweed) sheets');
INSERT INTO "public"."ingredients" VALUES (33, 'pumpkin or squash (try kabocha), peeled, deseeded and chopped into chunks');
INSERT INTO "public"."ingredients" VALUES (34, 'self-raising flour');
INSERT INTO "public"."ingredients" VALUES (35, 'baking powder');
INSERT INTO "public"."ingredients" VALUES (36, 'melted butter, plus extra for cooking');
INSERT INTO "public"."ingredients" VALUES (37, 'milk');
INSERT INTO "public"."ingredients" VALUES (38, 'pack closed cup mushrooms');
INSERT INTO "public"."ingredients" VALUES (39, 'rapeseed oil, plus 2 drops');
INSERT INTO "public"."ingredients" VALUES (40, 'cherry tomatoes, halved, or 8 tomatoes, cut into wedges');
INSERT INTO "public"."ingredients" VALUES (41, 'porridge oats');
INSERT INTO "public"."ingredients" VALUES (42, 'English mustard powder made up with water');
INSERT INTO "public"."ingredients" VALUES (43, 'sriracha');
INSERT INTO "public"."ingredients" VALUES (44, 'hoisin sauce');
INSERT INTO "public"."ingredients" VALUES (45, 'wholewheat fusilli');
INSERT INTO "public"."ingredients" VALUES (46, 'frozen peas');
INSERT INTO "public"."ingredients" VALUES (47, 'low-fat crème fraîche');

-- ----------------------------
-- Table structure for instructions
-- ----------------------------
DROP TABLE IF EXISTS "public"."instructions";
CREATE TABLE "public"."instructions" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "step" varchar(1000) COLLATE "pg_catalog"."default",
  "id_recipe" int4
)
;

-- ----------------------------
-- Records of instructions
-- ----------------------------
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (1, 'Pierwszy krok jest giga szybki.', 30);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (2, 'Drugi jeszcze szybszy.', 30);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (3, 'Pierwszy krok jest giga szybki.', 31);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (4, 'Drugi jeszcze szybszy.', 31);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (5, 'Szybko razraz.', 32);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (6, 'Ale jazda.', 32);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (7, 'Szybko razraz.', 33);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (8, 'Ale jazda.', 33);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (9, 'Szybko razraz.', 34);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (10, 'Ale jazda.', 34);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (14, 'Jeden', 39);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (15, 'Dwa', 39);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (16, 'Osiem', 39);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (17, 'Jeden', 40);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (18, 'Dwa', 40);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (19, 'Osiem', 40);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (20, 'Instrukcja', 41);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (21, 'Krok jeden', 42);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (22, 'Krok jeden', 43);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (23, 'Krok jeden', 44);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (24, 'Heat 2 tbsp olive oil in a large saucepan, then gently cook 2 finely chopped onions for 5 mins, until soft but not coloured.', 45);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (25, 'Add 1kg pumpkin or squash, cut into chunks, to the pan, then carry on cooking for 8-10 mins, stirring occasionally until it starts to soften and turn golden.', 45);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (26, 'Pour 700ml vegetable or chicken stock into the pan and season with salt and pepper. Bring to the boil, then simmer for 10 mins until the squash is very soft.', 45);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (27, 'Pour 150ml double cream into the pan, bring back to the boil, then purée with a hand blender. For an extra-velvety consistency you can pour the soup through a fine sieve. The soup can now be frozen for up to 2 months.', 45);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (28, 'To make the croutons: cut 4 slices wholemeal seeded bread into small squares.', 45);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (29, 'Heat 2 tbsp olive oil in a frying pan, then fry the bread until it starts to become crisp.', 45);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (30, 'Add a handful of pumpkin seeds to the pan, then cook for a few mins more until they are toasted. These can be made a day ahead and stored in an airtight container.', 45);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (31, 'Reheat the soup if needed, taste for seasoning, then serve scattered with croutons and seeds and drizzled with more olive oil, if you want.', 45);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (32, 'Heat oven to 220C/200C fan/gas 7. Toss the chips with the oil, 1 tsp chilli flakes and some seasoning. Arrange in a single layer on a large baking tray and cook for about 30 mins, turning halfway through.', 48);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (33, 'Put the mince, remaining chilli flakes, onion, Parmesan, tomato ketchup and lots of black pepper in a large bowl and mix to combine. Shape into 4 burgers. Ten mins before the chips are ready, put the burgers on a baking tray and bake for 10 mins until cooked through.', 48);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (34, 'Top one half of the buns with the lettuce, tomato and onion. Add the burgers, then top with the roll tops. Serve with chips and pickles on the side.', 48);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (49, 'Top one half of the buns with the lettuce, tomato and onion. Add the burgers, then top with the roll tops. Serve with chips and pickles on the side.', 53);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (45, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (46, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (47, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (48, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (50, 'Put a large saucepan on a medium heat and add 1 tbsp olive oil.', 54);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (51, 'Add 4 finely chopped bacon rashers and fry for 10 mins until golden and crisp.', 54);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (52, 'Reduce the heat and add the 2 onions, 2 carrots, 2 celery sticks, 2 garlic cloves and the leaves from 2-3 sprigs rosemary, all finely chopped, then fry for 10 mins. Stir the veg often until it softens.', 54);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (53, 'Increase the heat to medium-high, add 500g beef mince and cook stirring for 3-4 mins until the meat is browned all over.', 54);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (54, 'Add 2 tins plum tomatoes, the finely chopped leaves from ¾ small pack basil, 1 tsp dried oregano, 2 bay leaves, 2 tbsp tomato purée, 1 beef stock cube, 1 deseeded and finely chopped red chilli (if using), 125ml red wine and 6 halved cherry tomatoes. Stir with a wooden spoon, breaking up the plum tomatoes.', 54);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (55, 'Bring to the boil, reduce to a gentle simmer and cover with a lid. Cook for 1 hr 15 mins stirring occasionally, until you have a rich, thick sauce.', 54);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (98, 'Bring a pan of water to the boil and cook the fusilli according to the pack instructions', 62);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (99, 'Meanwhile, heat a knob of butter in a saucepan, then add the shallot and cook for 5 mins or until softened.', 62);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (100, 'Add the peas, salmon, crème fraîche and 50ml water. Crumble in the stock cube.', 62);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (101, 'Cook for 3-4 mins until cooked through, stir in the chives and some black pepper. Then stir through to coat the pasta. Serve in bowls.', 62);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (35, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (36, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (37, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (38, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (39, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (40, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (41, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (42, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (43, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (44, NULL, NULL);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (56, 'Add the 75g grated parmesan, check the seasoning and stir.', 54);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (57, 'When the bolognese is nearly finished, cook 400g spaghetti following the pack instructions.', 54);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (58, 'Drain the spaghetti and either stir into the bolognese sauce, or serve the sauce on top. Serve with more grated parmesan, the remaining basil leaves and crusty bread, if you like.', 54);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (59, 'Tip the flour into a bowl, then stir in the yeast and 1 tsp salt. Make a well in the centre and pour in 200ml warm water (make sure it’s not too hot) along with the oil. Stir together with a wooden spoon until you have a soft, fairly wet dough.', 55);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (60, 'Tip the dough out onto a lightly floured surface and knead for 5 mins until smooth. Cover with a tea towel and set aside for an hour or so or until the dough has puffed up and doubled in size. You can also leave the rough, unkneaded dough in the bowl, cover with a tea towel and leave in the fridge overnight and the dough will continue to prove on its own.', 55);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (61, 'Meanwhile, make the tomato sauce. Put the oil in a small pan and fry the garlic briefly (don’t let it brown), then add the passata and simmer everything until the sauce thickens a little. Leave to cool.', 55);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (62, 'Once the dough has risen, knead it quickly in the bowl to knock it back, then tip out onto a lightly floured surface and cut into two balls. Roll out each ball into a large teardrop that is very thin and about 25cm across (teardrop shapes fit baking sheets more easily than rounds).', 55);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (63, 'Heat oven to 240C/220C fan/ gas 9 with a large baking sheet inside. Lift one of the bases onto another floured baking sheet. Smooth the sauce over the base with the back of a spoon, scatter over half the mozzarella, drizzle with olive oil and season. Put the pizza, still on its baking sheet, on top of the hot sheet in the oven and bake for 8-10 mins until crisp.', 55);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (64, 'Tip the flour into a bowl, then stir in the yeast and 1 tsp salt. Make a well in the centre and pour in 200ml warm water (make sure it’s not too hot) along with the oil. Stir together with a wooden spoon until you have a soft, fairly wet dough.', 56);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (65, 'Tip the dough out onto a lightly floured surface and knead for 5 mins until smooth. Cover with a tea towel and set aside for an hour or so or until the dough has puffed up and doubled in size. You can also leave the rough, unkneaded dough in the bowl, cover with a tea towel and leave in the fridge overnight and the dough will continue to prove on its own.', 56);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (66, 'Meanwhile, make the tomato sauce. Put the oil in a small pan and fry the garlic briefly (don’t let it brown), then add the passata and simmer everything until the sauce thickens a little. Leave to cool.', 56);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (67, 'Once the dough has risen, knead it quickly in the bowl to knock it back, then tip out onto a lightly floured surface and cut into two balls. Roll out each ball into a large teardrop that is very thin and about 25cm across (teardrop shapes fit baking sheets more easily than rounds).', 56);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (68, 'Heat oven to 240C/220C fan/ gas 9 with a large baking sheet inside. Lift one of the bases onto another floured baking sheet. Smooth the sauce over the base with the back of a spoon, scatter over half the mozzarella, drizzle with olive oil and season. Put the pizza, still on its baking sheet, on top of the hot sheet in the oven and bake for 8-10 mins until crisp.', 56);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (69, 'KIDS the writing in bold is for you. ADULTS the rest is for you. TO MAKE SUSHI ROLLS: Pat out some rice. Lay a nori sheet on the mat, shiny-side down. Dip your hands in the vinegared water, then pat handfuls of rice on top in a 1cm thick layer, leaving the furthest edge from you clear.', 57);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (70, 'Spread over some Japanese mayonnaise. Use a spoon to spread out a thin layer of mayonnaise down the middle of the rice.', 57);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (71, 'Add the filling. Get your child to top the mayonnaise with a line of their favourite fillings – here we’ve used tuna and cucumber.', 57);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (72, 'Roll it up. Lift the edge of the mat over the rice, applying a little pressure to keep everything in a tight roll.', 57);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (73, 'Stick down the sides like a stamp. When you get to the edge without any rice, brush with a little water and continue to roll into a tight roll.', 57);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (74, 'Wrap in cling film. Remove the mat and roll tightly in cling film before a grown-up cuts the sushi into thick slices, then unravel the cling film.', 57);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (75, 'TO MAKE PRESSED SUSHI: Layer over some smoked salmon. Line a loaf tin with cling film, then place a thin layer of smoked salmon inside on top of the cling film.', 57);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (76, 'Cover with rice and press down. Press about 3cm of rice over the fish, fold the cling film over and press down as much as you can, using another tin if you have one.', 57);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (77, 'Tip it out like a sandcastle. Turn block of sushi onto a chopping board. Get a grown-up to cut into fingers, then remove the cling film.', 57);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (78, 'TO MAKE SUSHI BALLS: Choose your topping. Get a small square of cling film and place a topping, like half a prawn or a small piece of smoked salmon, on it. Use damp hands to roll walnut-sized balls of rice and place on the topping.', 57);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (79, 'Make into tight balls. Bring the corners of the cling film together and tighten into balls by twisting it up, then unwrap and serve.', 57);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (80, 'Heat 2 tbsp olive oil in a large saucepan, then gently cook 2 finely chopped onions for 5 mins, until soft but not coloured.', 58);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (81, 'Add 1kg pumpkin or squash, cut into chunks, to the pan, then carry on cooking for 8-10 mins, stirring occasionally until it starts to soften and turn golden.', 58);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (82, 'Pour 700ml vegetable or chicken stock into the pan and season with salt and pepper. Bring to the boil, then simmer for 10 mins until the squash is very soft.
', 58);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (83, 'Pour 150ml double cream into the pan, bring back to the boil, then purée with a hand blender. For an extra-velvety consistency you can pour the soup through a fine sieve. The soup can now be frozen for up to 2 months.', 58);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (84, 'To make the croutons: cut 4 slices wholemeal seeded bread into small squares.', 58);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (85, 'Heat 2 tbsp olive oil in a frying pan, then fry the bread until it starts to become crisp.', 58);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (86, 'Add a handful of pumpkin seeds to the pan, then cook for a few mins more until they are toasted. These can be made a day ahead and stored in an airtight container.', 58);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (87, 'Reheat the soup if needed, taste for seasoning, then serve scattered with croutons and seeds and drizzled with more olive oil, if you want.', 58);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (88, 'Mix 200g self-raising flour, 1 ½ tsp baking powder, 1 tbsp golden caster sugar and a pinch of salt together in a large bowl.', 59);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (89, 'Create a well in the centre with the back of your spoon then add 3 large eggs, 25g melted butter and 200ml milk.', 59);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (90, 'Whisk together either with a balloon whisk or electric hand beaters until smooth then pour into a jug.', 59);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (91, 'Heat a small knob of butter and 1 tsp of oil in a large, non-stick frying pan over a medium heat. When the butter looks frothy, pour in rounds of the batter, approximately 8cm wide. Make sure you don’t put the pancakes too close together as they will spread during cooking. Cook the pancakes on one side for about 1-2 mins or until lots of tiny bubbles start to appear and pop on the surface. Flip the pancakes over and cook for a further minute on the other side. Repeat until all the batter is used up.', 59);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (92, 'Serve your pancakes stacked up on a plate with a drizzle of maple syrup and any of your favourite toppings.', 59);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (93, 'Thickly slice half the pack of mushrooms. Heat 2 tsp rapeseed oil in a non-stick pan. Add the mushrooms, stir briefly then fry with the lid on the pan for 6-8 mins. Stir in half the tomatoes then cook 1-2 mins more with the lid off until softened.', 60);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (94, 'Beat together the eggs really well with the parsley and oats. Heat a drop of oil in a large non-stick frying pan. Pour in a ¼ of the egg mix and fry for 1 min until almost set, flip over as if making a pancake. Tip from the pan, spread with a quarter of the mustard, spoon a ¼ the filling down the centre and roll up. Now make a second wrap using another ¼ of the egg mix and filling. If you''re following our Healthy Diet Plan, save the rest for the following day.', 60);
INSERT INTO "public"."instructions" OVERRIDING SYSTEM VALUE VALUES (95, 'Mix the sriracha with the mayonnaise. Brush the sausages with the hoisin sauce and cook under a grill following pack instructions. Split the hot dog buns, fill each with a sausage and spoon over some extra hoisin sauce. Top with the cucumber, the sriracha mayonnaise and spring onions.', 61);

-- ----------------------------
-- Table structure for meal_type
-- ----------------------------
DROP TABLE IF EXISTS "public"."meal_type";
CREATE TABLE "public"."meal_type" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "type" varchar(50) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of meal_type
-- ----------------------------
INSERT INTO "public"."meal_type" OVERRIDING SYSTEM VALUE VALUES (1, 'breakfast');
INSERT INTO "public"."meal_type" OVERRIDING SYSTEM VALUE VALUES (2, 'brunch');
INSERT INTO "public"."meal_type" OVERRIDING SYSTEM VALUE VALUES (3, 'lunch');
INSERT INTO "public"."meal_type" OVERRIDING SYSTEM VALUE VALUES (4, 'dinner');
INSERT INTO "public"."meal_type" OVERRIDING SYSTEM VALUE VALUES (5, 'dessert');
INSERT INTO "public"."meal_type" OVERRIDING SYSTEM VALUE VALUES (6, 'supper');
INSERT INTO "public"."meal_type" OVERRIDING SYSTEM VALUE VALUES (7, 'snack');

-- ----------------------------
-- Table structure for nutrition
-- ----------------------------
DROP TABLE IF EXISTS "public"."nutrition";
CREATE TABLE "public"."nutrition" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "id_recipe" int4 NOT NULL,
  "calories" int4,
  "fat" numeric(5,2),
  "saturated_fat" numeric(5,2),
  "carbohydrates" numeric(5,2),
  "sugars" numeric(5,2),
  "fiber" numeric(5,2),
  "protein" numeric(5,2),
  "salt" numeric(5,2)
)
;

-- ----------------------------
-- Records of nutrition
-- ----------------------------
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (1, 30, 350, 35.00, 23.00, 45.00, 45.00, NULL, 55.00, 34.00);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (2, 31, 350, 35.00, 23.00, 45.00, 45.00, NULL, 55.00, 34.00);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (3, 32, 455, 45.00, 453.00, 45.00, 33.00, 23.00, 32.00, 53.00);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (4, 33, 455, 45.00, 453.00, 45.00, 33.00, 23.00, 32.00, 53.00);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (5, 34, 455, 45.00, 453.00, 45.00, 33.00, 23.00, 32.00, 53.00);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (7, 39, 454, 33.00, 43.00, 76.00, 56.00, 78.00, 56.00, 45.00);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (8, 40, 454, 33.00, 43.00, 76.00, 56.00, 78.00, 56.00, 45.00);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (9, 41, 323, 32.00, 32.00, 33.00, 22.00, 11.00, 34.00, 23.00);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (10, 42, 54, 65.00, 4.00, 54.00, 87.00, 8.00, 5.00, 4.00);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (11, 43, 54, 65.00, 4.00, 54.00, 87.00, 8.00, 5.00, 4.00);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (12, 44, 54, 65.00, 4.00, 54.00, 87.00, 8.00, 5.00, 4.00);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (13, 45, 317, 24.00, 9.00, 20.00, 6.00, 0.00, 6.00, 0.54);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (15, 48, 467, 13.00, 5.00, 57.00, 15.00, 7.00, 31.00, 1.30);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (17, 50, 467, 13.00, 5.00, 57.00, 15.00, 7.00, 31.00, 1.30);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (18, 51, 467, 13.00, 5.00, 57.00, 15.00, 7.00, 31.00, 1.30);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (19, 52, 467, 13.00, 5.00, 57.00, 15.00, 7.00, 31.00, 1.30);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (20, 53, 467, 13.00, 5.00, 57.00, 15.00, 7.00, 31.00, 1.30);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (21, 54, 624, 25.00, 10.00, 58.00, 12.00, 6.00, 35.00, 1.60);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (22, 55, 511, 20.00, 10.00, 59.00, 2.00, 3.00, 22.00, 1.80);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (23, 56, 511, 20.00, 10.00, 59.00, 2.00, 3.00, 22.00, 1.80);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (24, 57, 390, 9.00, 1.00, 70.00, 11.00, 4.00, 8.00, 0.50);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (25, 58, 317, 24.00, 9.00, 20.00, 6.00, 0.00, 6.00, 0.54);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (26, 59, 356, 13.00, 6.00, 48.00, 8.00, 2.00, 13.00, 1.30);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (27, 60, 429, 20.00, 4.00, 31.00, 4.00, 6.00, 28.00, 0.55);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (28, 61, 406, 20.00, 6.00, 42.00, 10.00, 3.00, 13.00, 1.70);
INSERT INTO "public"."nutrition" OVERRIDING SYSTEM VALUE VALUES (29, 62, 463, 19.00, 6.00, 44.00, 5.00, 7.00, 25.00, 0.20);

-- ----------------------------
-- Table structure for recipes
-- ----------------------------
DROP TABLE IF EXISTS "public"."recipes";
CREATE TABLE "public"."recipes" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "title" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default",
  "cook_time" int4 NOT NULL,
  "serving_size" int4,
  "id_meal_type" int4,
  "id_difficulty" int4,
  "id_cuisine" int4,
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "pdated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "id_diet" int4,
  "image" varchar(255) COLLATE "pg_catalog"."default",
  "rating" varchar(1000) COLLATE "pg_catalog"."default",
  "views" int8 DEFAULT 0,
  "ids_of_users_who_rated" varchar(1000) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of recipes
-- ----------------------------
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (51, 'Beef burger with sweet potato chilli chips', 'Give hamburgers a healthy makeover by oven-cooking lean beef and serving with wholemeal bun and sweet potatoes', 30, 4, NULL, 1, NULL, '2024-01-11 00:00:00', '2024-01-11 21:22:34.668779', NULL, 'amirali-mirhashemian-9hIJ4ZLMnZA-unsplash (1).jpg', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (52, 'Beef burger with sweet potato chilli chips', 'Give hamburgers a healthy makeover by oven-cooking lean beef and serving with wholemeal bun and sweet potatoes', 30, 4, NULL, 1, NULL, '2024-01-11 00:00:00', '2024-01-11 21:24:45.030028', NULL, 'amirali-mirhashemian-9hIJ4ZLMnZA-unsplash (1).jpg', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (54, 'The best spaghetti bolognese recipe', 'Our best ever spaghetti bolognese is super easy and a true Italian classic with a meaty, chilli sauce. This pasta bolognese recipe is sure to become a family favourite.', 110, 6, NULL, 1, NULL, '2024-01-11 00:00:00', '2024-01-11 21:56:52.271842', NULL, 'set-sj-dDStbFpL-G4-unsplash (1).jpg', 'a:5:{i:1;i:0;i:2;i:1;i:3;i:1;i:4;i:1;i:5;i:6;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (5, 'cc', 'cc', 15, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 18:43:52.826622', NULL, '262503471_437113708135302_3933178105233450055_n.jpg', 'a:5:{i:1;i:0;i:2;i:0;i:3;i:1;i:4;i:0;i:5;i:4;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (21, 'Pycha jedzonko', 'Pycha jesc', 20, NULL, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 18:46:55.355428', NULL, 'Zrzut ekranu_20230218_005116.png', 'a:5:{i:1;i:0;i:2;i:0;i:3;i:1;i:4;i:0;i:5;i:1;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (41, 'Przpeis', 'cos', 23, 2, NULL, NULL, NULL, '2024-01-10 00:00:00', '2024-01-10 12:30:30.203554', NULL, '2021-09-15 (3).png', 'a:5:{i:1;i:0;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:1;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (6, 'cc', 'cc', 60, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 19:38:13.137887', NULL, '262503471_437113708135302_3933178105233450055_n.jpg', 'a:5:{i:1;i:0;i:2;i:1;i:3;i:1;i:4;i:0;i:5;i:4;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (8, 'ui', 'ui', 80, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 19:42:30.799059', NULL, '2020-11-05.png', 'a:5:{i:1;i:1;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:0;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (9, 'ui', 'ui', 90, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 19:44:15.090804', NULL, '2020-11-05.png', 'a:5:{i:1;i:1;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:0;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (22, 'Super zarcie', 'Cos', 23, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:40:03.462019', NULL, '2021-09-13 (2).png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (11, 'ui', 'ui', 110, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 19:44:44.69627', NULL, '2020-11-05.png', 'a:5:{i:1;i:0;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:1;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (12, 'ui', 'ui', 30, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 19:46:01.539372', NULL, '2020-11-05.png', 'a:5:{i:1;i:0;i:2;i:3;i:3;i:1;i:4;i:1;i:5;i:0;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (24, 'Super zarcie', 'Cos', 23, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:44:26.778661', NULL, '2021-09-13 (2).png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (27, 'Super zarcie', 'Cos', 23, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:48:18.558613', NULL, '2021-09-13 (2).png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (56, 'Pizza', 'Make pizza for the family with a homemade base and tomato sauce. The veggie recipe is perfect to get kids involved in cooking. Top with mozzarella and fresh basil', 90, 4, NULL, 2, NULL, '2024-01-12 00:00:00', '2024-01-12 17:26:05.481781', NULL, 'saahil-khatkhate-kfDsMDyX1K0-unsplash (1).jpg', 'a:5:{i:1;i:3;i:2;i:4;i:3;i:2;i:4;i:6;i:5;i:62;}', 1, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (44, 'Tytuł', 'opis', 23, 2, NULL, 1, NULL, '2024-01-10 00:00:00', '2024-01-10 21:13:23.354692', NULL, '2021-10-28 (6).png', 'a:5:{i:1;i:0;i:2;i:4;i:3;i:0;i:4;i:5;i:5;i:0;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (14, 'ui', 'ui', 30, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 19:54:31.143816', NULL, '2020-11-05.png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (15, 'ui', 'ui', 20, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 19:54:35.841173', NULL, '2020-11-05.png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (17, 'ui', 'ui', 50, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 20:57:54.105623', NULL, '2020-11-05.png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (18, 'ui', 'ui', 50, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 21:16:55.790572', NULL, '2020-11-05.png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (19, 'hej:>', 'a no tak', 67, NULL, NULL, NULL, NULL, '2024-01-02 00:00:00', '2024-01-02 18:18:53.210891', NULL, '2021-08-25.png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (20, 'hej:>', 'a no tak', 34, NULL, NULL, NULL, NULL, '2024-01-02 00:00:00', '2024-01-02 18:26:38.946727', NULL, '2021-08-25.png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (7, 'cc', 'cc', 35, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 19:40:56.741209', NULL, '262503471_437113708135302_3933178105233450055_n.jpg', 'a:5:{i:1;i:0;i:2;i:0;i:3;i:2;i:4;i:0;i:5;i:3;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (42, 'Tytuł', 'opis', 23, 2, NULL, 1, NULL, '2024-01-10 00:00:00', '2024-01-10 14:18:03.924915', NULL, '2021-10-28 (6).png', 'a:5:{i:1;i:3;i:2;i:0;i:3;i:0;i:4;i:1;i:5;i:0;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (4, 'cos', 'cos', 20, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 18:33:00.404605', NULL, '262503471_437113708135302_3933178105233450055_n.jpg', 'a:5:{i:1;i:101;i:2;i:8;i:3;i:13;i:4;i:13;i:5;i:197;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (57, 'Simple sushi', 'Kids can help with this Japanese dish. They can help cook the sticky rice and then roll and assemble the pieces with their preferred ingredients', 60, 2, NULL, 1, NULL, '2024-01-12 00:00:00', '2024-01-12 17:34:08.800858', NULL, 'derek-duran-Jz4QMhLvGgw-unsplash (1).jpg', 'a:5:{i:1;i:0;i:2;i:0;i:3;i:0;i:4;i:1;i:5;i:0;}', 1, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (43, 'Tytuł', 'opis', 23, 2, NULL, 1, NULL, '2024-01-10 00:00:00', '2024-01-10 21:09:58.917094', NULL, '2021-10-28 (6).png', 'a:5:{i:1;i:5;i:2;i:6;i:3;i:0;i:4;i:2;i:5;i:1;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (53, 'Beef burger with sweet potato chilli chips', 'Give hamburgers a healthy makeover by oven-cooking lean beef and serving with wholemeal bun and sweet potatoes', 30, 4, NULL, 1, NULL, '2024-01-11 00:00:00', '2024-01-11 21:39:21.124255', NULL, 'amirali-mirhashemian-9hIJ4ZLMnZA-unsplash (1).jpg', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (45, 'Pumpkin soup', 'Whip up this easy pumpkin soup as a starter for a dinner party or a light supper when you need a bit of comfort – it has a lovely silky texture', 25, 6, NULL, 1, NULL, '2024-01-11 00:00:00', '2024-01-11 14:19:36.305012', NULL, 'irina-89UsTc5bjsw-unsplash (1).jpg', 'a:5:{i:1;i:0;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:1;}', 0, 'a:1:{i:0;a:1:{s:2:"id";i:7;}}');
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (10, 'ui', 'ui', 100, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 19:44:30.847512', NULL, '2020-11-05.png', 'a:5:{i:1;i:1;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:0;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (23, 'Super zarcie', 'Cos', 23, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:42:45.029017', NULL, '2021-09-13 (2).png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (25, 'Super zarcie', 'Cos', 23, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:44:43.48533', NULL, '2021-09-13 (2).png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (26, 'Super zarcie', 'Cos', 23, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:47:41.494795', NULL, '2021-09-13 (2).png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (16, 'ui', 'ui', 20, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 19:54:44.153105', NULL, '2020-11-05.png', 'a:5:{i:1;i:0;i:2;i:3;i:3;i:0;i:4;i:0;i:5;i:0;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (28, 'Jedzenie', 'szybkie jedzenie', 20, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:51:01.007098', NULL, '2021-02-25 (5).png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (29, 'Jedzenie', 'szybkie jedzenie', 20, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:52:36.23801', NULL, '2021-02-25 (5).png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (30, 'Chicken wrap', 'Bardzo szybko się robi. Polecanko :)', 45, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:55:06.529514', NULL, 'Zrzut ekranu_20221212_022720.png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (31, 'Chicken wrap', 'Bardzo szybko się robi. Polecanko :)', 45, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:56:08.824366', NULL, 'Zrzut ekranu_20221212_022720.png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (32, 'Chicken wrap', 'Szybciutko sie robi.', 45, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:57:37.663041', NULL, 'Zrzut ekranu_20221212_022720.png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (33, 'Chicken wrap', 'Szybciutko sie robi.', 45, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:58:11.345992', NULL, 'Zrzut ekranu_20221212_022720.png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (34, 'Chicken wrap', 'Szybciutko sie robi.', 45, 2, NULL, NULL, NULL, '2024-01-08 00:00:00', '2024-01-08 19:58:51.975663', NULL, 'Zrzut ekranu_20221212_022720.png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (39, 'Nanan mniam', 'mnaima', 23, 2, NULL, NULL, NULL, '2024-01-09 00:00:00', '2024-01-09 11:55:15.840375', NULL, '2021-10-28 (7).png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (40, 'Nanan mniam', 'mnaima', 23, 2, NULL, NULL, NULL, '2024-01-09 00:00:00', '2024-01-09 12:04:39.747207', NULL, '2021-10-28 (7).png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (13, 'ui', 'ui', 45, NULL, NULL, NULL, NULL, '2023-12-29 00:00:00', '2023-12-29 19:53:02.111728', NULL, '2020-11-05.png', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (59, 'American pancakes', 'Easy, American-style, fluffy pancakes are great for feeding a crowd at breakfast or brunch. Top with something sweet like fruit, jam or syrup, or rashers of crispy bacon.', 55, 4, NULL, 3, NULL, '2024-01-13 00:00:00', '2024-01-13 19:57:47.825014', NULL, 'nikldn-qp7WA8AV2x0-unsplash (1).jpg', 'a:5:{i:1;i:20;i:2;i:0;i:3;i:0;i:4;i:25;i:5;i:70;}', 44, 'a:3:{i:0;a:1:{s:2:"id";i:7;}i:1;a:1:{s:2:"id";i:8;}i:2;a:1:{s:2:"id";i:10;}}');
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (60, 'Breakfast egg wraps', 'Enjoy these protein-rich egg wraps filled with mushrooms and tomatoes for a quick, filling and healthy breakfast. It provides iron, folate and fibre.

Healthy
Vegetarian', 20, 4, NULL, 2, NULL, '2024-01-13 00:00:00', '2024-01-13 23:30:02.355382', NULL, 'quin-engle-hAFCfzaeVJg-unsplash (1).jpg', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (55, 'Pizza', 'Make pizza for the family with a homemade base and tomato sauce. The veggie recipe is perfect to get kids involved in cooking. Top with mozzarella and fresh basil', 90, 4, NULL, 2, NULL, '2024-01-12 00:00:00', '2024-01-12 17:23:47.741376', NULL, 'saahil-khatkhate-kfDsMDyX1K0-unsplash (1).jpg', NULL, 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (61, 'Hoisin hot dogs', 'Grill some sausages brushed with hoisin sauce, then top with cucumber and spring onion for a different take on a classic hot dog', 35, 4, NULL, 1, NULL, '2024-01-13 00:00:00', '2024-01-13 23:33:41.093684', NULL, 'daniel-lloyd-blunk-fernandez-FjXCbRMMSSc-unsplash (1).jpg', 'a:5:{i:1;i:3;i:2;i:0;i:3;i:0;i:4;i:1;i:5;i:10;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (48, 'Beef burger with sweet potato chilli chips', 'Give hamburgers a healthy makeover by oven-cooking lean beef and serving with wholemeal bun and sweet potatoes', 30, 4, NULL, 1, NULL, '2024-01-11 00:00:00', '2024-01-11 21:17:40.553721', NULL, 'amirali-mirhashemian-9hIJ4ZLMnZA-unsplash (1).jpg', 'a:5:{i:1;i:0;i:2;i:3;i:3;i:0;i:4;i:6;i:5;i:14;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (62, 'Pasta with salmon & peas', 'Make this salmon pasta in under 20 minutes for a dinner the whole family can enjoy. Kids will love the fun-shaped pasta while packing in fibre and omega-3', 30, 4, NULL, 2, NULL, '2024-01-17 00:00:00', '2024-01-17 13:47:34.328948', NULL, 'eaters-collective-ddZYOtZUnBk-unsplash (1).jpg', NULL, 1, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (50, 'Beef burger with sweet potato chilli chips', 'Give hamburgers a healthy makeover by oven-cooking lean beef and serving with wholemeal bun and sweet potatoes', 30, 4, NULL, 1, NULL, '2024-01-11 00:00:00', '2024-01-11 21:22:21.039701', NULL, 'amirali-mirhashemian-9hIJ4ZLMnZA-unsplash (1).jpg', 'a:5:{i:1;i:3;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:8;}', 0, NULL);
INSERT INTO "public"."recipes" OVERRIDING SYSTEM VALUE VALUES (58, 'Pumpkin soup', 'Whip up this easy pumpkin soup as a starter for a dinner party or a light supper when you need a bit of comfort – it has a lovely silky texture', 45, 6, NULL, 1, NULL, '2024-01-12 00:00:00', '2024-01-12 17:37:46.423961', NULL, 'irina-89UsTc5bjsw-unsplash (2).jpg', 'a:5:{i:1;i:9;i:2;i:2;i:3;i:1;i:4;i:1;i:5;i:73;}', 1, 'a:1:{i:0;a:1:{s:2:"id";i:10;}}');

-- ----------------------------
-- Table structure for recipes_ingredients
-- ----------------------------
DROP TABLE IF EXISTS "public"."recipes_ingredients";
CREATE TABLE "public"."recipes_ingredients" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1
),
  "id_recipe" int4 NOT NULL,
  "id_ingredient" int4 NOT NULL,
  "quantity" numeric(10,2),
  "measurement" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of recipes_ingredients
-- ----------------------------
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (1, 39, 2, 4.00, 'łyżki');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (2, 39, 3, 5.00, 'szklanka');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (3, 40, 2, 4.00, 'łyżki');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (4, 40, 3, 5.00, 'szklanka');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (5, 41, 4, 1.00, 'szklanka');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (6, 42, 5, 2.00, 'szklanki');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (7, 43, 5, 2.00, 'szklanki');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (8, 44, 5, 2.00, 'szklanki');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (9, 45, 6, 2.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (10, 45, 7, 1.00, 'kg');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (11, 45, 8, 700.00, 'ml');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (12, 45, 9, 150.00, 'ml');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (13, 48, 6, 1.00, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (14, 48, 10, 1.00, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (15, 48, 11, 400.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (16, 48, 12, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (17, 48, 13, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (23, 50, 6, 1.00, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (24, 50, 10, 1.00, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (25, 50, 11, 400.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (26, 50, 12, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (27, 50, 13, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (28, 51, 6, 1.00, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (29, 51, 10, 1.00, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (30, 51, 11, 400.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (31, 51, 12, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (32, 51, 13, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (33, 52, 6, 1.00, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (34, 52, 10, 1.00, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (35, 52, 11, 400.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (36, 52, 12, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (37, 52, 13, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (38, 53, 6, 1.00, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (39, 53, 10, 1.00, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (40, 53, 11, 400.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (41, 53, 12, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (42, 53, 13, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (43, 54, 6, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (44, 54, 14, 500.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (45, 54, 15, 800.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (46, 54, 16, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (47, 54, 17, 2.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (48, 54, 18, 125.00, 'ml');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (49, 54, 19, 75.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (50, 54, 20, 400.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (51, 55, 21, 300.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (52, 55, 22, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (53, 55, 6, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (54, 55, 23, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (55, 55, 24, 2.00, 'szt');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (56, 55, 25, 200.00, 'ml');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (57, 55, 26, 8.00, 'szt');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (58, 56, 21, 300.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (59, 56, 22, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (60, 56, 6, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (61, 56, 23, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (62, 56, 24, 2.00, 'szt');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (63, 56, 25, 200.00, 'ml');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (64, 56, 26, 8.00, 'szt');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (65, 57, 27, 300.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (66, 57, 28, 100.00, 'ml');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (67, 57, 29, 2.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (68, 57, 30, 3.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (69, 57, 28, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (70, 57, 31, 1.00, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (71, 57, 32, 25.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (72, 58, 6, 2.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (73, 58, 33, 1.00, 'kg');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (74, 58, 8, 700.00, 'ml');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (75, 58, 9, 150.00, 'ml');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (76, 58, 6, 2.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (77, 59, 34, 200.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (78, 59, 35, 1.50, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (79, 59, 29, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (80, 59, 36, 25.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (81, 59, 37, 200.00, 'ml');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (82, 60, 38, 500.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (83, 60, 39, 4.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (84, 60, 40, 320.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (85, 60, 41, 8.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (86, 60, 42, 4.00, 'tsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (87, 61, 43, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (88, 61, 30, 1.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (89, 61, 44, 2.00, 'tbsp');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (90, 62, 45, 240.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (91, 62, 46, 140.00, 'g');
INSERT INTO "public"."recipes_ingredients" OVERRIDING SYSTEM VALUE VALUES (92, 62, 47, 140.00, 'g');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int4 NOT NULL GENERATED ALWAYS AS IDENTITY (
INCREMENT 1
MINVALUE  1
MAXVALUE 1000
START 1
CACHE 1
),
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "login" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" OVERRIDING SYSTEM VALUE VALUES (1, 'kinga@wp.pl', 'kinga', '2023-12-29 15:48:52.077322', 'kinga123');
INSERT INTO "public"."users" OVERRIDING SYSTEM VALUE VALUES (2, 'ola@wp.pl', 'ola', '2023-12-29 15:48:52.077322', 'ola01');
INSERT INTO "public"."users" OVERRIDING SYSTEM VALUE VALUES (3, 'test@test.pl', '$2y$10$CWaRI0kukAO2MLsisV4J6eiaTzALq2r2AxbSJPWvGRJ7DzHLeGZaa', '2024-01-10 22:17:01', 'test');
INSERT INTO "public"."users" OVERRIDING SYSTEM VALUE VALUES (4, 'test2@test.pl', '$2y$10$QBfzyhj8M0chjcw3GhocfeFhh8hJ5yiScLDcmO47jQQTvu5YCHePq', '2024-01-10 22:25:04', 'test2');
INSERT INTO "public"."users" OVERRIDING SYSTEM VALUE VALUES (5, 'test3@test.pl', '$2y$10$ee75zIPAwmC8PNfSKAOpNuGbnpy8oqp9Fp6gdML3szyX.2OUYHfEG', '2024-01-10 22:25:59', 'test3');
INSERT INTO "public"."users" OVERRIDING SYSTEM VALUE VALUES (6, 'test4@test.pl', '$2y$10$T7LgMYhfEuf6XiGvRTtApeju9E6.t6UxVGKptwaOPKnxz2nuUHeSW', '2024-01-10 22:32:03', 'test4');
INSERT INTO "public"."users" OVERRIDING SYSTEM VALUE VALUES (7, 'test5@test.pl', '$2y$10$hGxzqrN3fV.Ojqj/YJCT8O9Ri15AD8F.QhbCXDfxovRqqDjanbfc.', '2024-01-10 22:35:07', 'test5');
INSERT INTO "public"."users" OVERRIDING SYSTEM VALUE VALUES (9, 'klaudia@wp.pl', '$2y$10$k1InqHKmJxY9ndRtGrLbEexe8lVY6dQHiL7EhMl4xXT.6MdbP1Sue', '2024-01-12 20:50:57', 'klaudia');
INSERT INTO "public"."users" OVERRIDING SYSTEM VALUE VALUES (8, 'ola1@poczta.pl', '$2y$10$V/1WeplUN7m2wVHLpX8bWeOypWtpeqvjgRhK2AHOe4AVZAWzBzjo2', '2024-01-12 19:22:29', 'ola1');
INSERT INTO "public"."users" OVERRIDING SYSTEM VALUE VALUES (10, 'ala@poczta.pl', '$2y$10$IuiskIG9kg2VzJGfh6.EGedEqiR.lshWXW5ICF8BzQfddRbcEevS2', '2024-01-17 22:29:00', 'ala');

-- ----------------------------
-- Table structure for users_recipes
-- ----------------------------
DROP TABLE IF EXISTS "public"."users_recipes";
CREATE TABLE "public"."users_recipes" (
  "id_users" int4 NOT NULL,
  "id_recipes" int4 NOT NULL,
  "saved_at" timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of users_recipes
-- ----------------------------

-- ----------------------------
-- Function structure for cascade_recipe_delete
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."cascade_recipe_delete"();
CREATE OR REPLACE FUNCTION "public"."cascade_recipe_delete"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN
   DELETE FROM users_recipes WHERE id_recipes = OLD.id;
   DELETE FROM nutrition WHERE id_recipe = OLD.id;
   DELETE FROM recipes_ingredients WHERE id_recipe = OLD.id;
   DELETE FROM instructions WHERE id_recipe = OLD.id;
   RETURN OLD;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for increment_recipe_views
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."increment_recipe_views"("recipe_id" int4);
CREATE OR REPLACE FUNCTION "public"."increment_recipe_views"("recipe_id" int4)
  RETURNS "pg_catalog"."void" AS $BODY$
BEGIN
    UPDATE recipes
    SET views = views + 1
    WHERE id = recipe_id;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- View structure for v_detailed_recipes
-- ----------------------------
DROP VIEW IF EXISTS "public"."v_detailed_recipes";
CREATE VIEW "public"."v_detailed_recipes" AS  SELECT rec.id AS recipe_id,
    rec.title,
    rec.description,
    rec.cook_time,
    rec.serving_size,
    diff.level AS difficulty,
    rec.image,
    rec.rating,
    rec.views,
    nut.calories,
    nut.fat,
    nut.carbohydrates,
    nut.sugars,
    nut.fiber,
    nut.protein,
    nut.salt,
    string_agg((((ing.ingredient_name::text || ' - '::text) || ri.quantity) || ' '::text) || ri.measurement::text, ', '::text) AS ingredients,
    string_agg(ins.step::text, ' || '::text ORDER BY ins.id) AS instructions
   FROM recipes rec
     JOIN difficulty diff ON rec.id_difficulty = diff.id
     JOIN nutrition nut ON rec.id = nut.id_recipe
     JOIN recipes_ingredients ri ON rec.id = ri.id_recipe
     JOIN ingredients ing ON ri.id_ingredient = ing.id
     LEFT JOIN instructions ins ON rec.id = ins.id_recipe
  GROUP BY rec.id, diff.level, nut.calories, nut.fat, nut.carbohydrates, nut.sugars, nut.fiber, nut.protein, nut.salt;

-- ----------------------------
-- View structure for v_ingredient_usage
-- ----------------------------
DROP VIEW IF EXISTS "public"."v_ingredient_usage";
CREATE VIEW "public"."v_ingredient_usage" AS  SELECT ing.id AS ingredient_id,
    ing.ingredient_name,
    count(ri.id_recipe) AS recipe_count
   FROM ingredients ing
     LEFT JOIN recipes_ingredients ri ON ing.id = ri.id_ingredient
  GROUP BY ing.id;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."User_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."User_id_seq"', 10, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."cuisine_id_seq"
OWNED BY "public"."cuisine"."id";
SELECT setval('"public"."cuisine_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."diet_id_seq"
OWNED BY "public"."diet"."id";
SELECT setval('"public"."diet_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."difficulty_id_seq"
OWNED BY "public"."difficulty"."id";
SELECT setval('"public"."difficulty_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."ingredient_id_seq"
OWNED BY "public"."ingredients"."id";
SELECT setval('"public"."ingredient_id_seq"', 47, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."instruction_id_seq"
OWNED BY "public"."instructions"."id";
SELECT setval('"public"."instruction_id_seq"', 101, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."meal_type_id_seq"
OWNED BY "public"."meal_type"."id";
SELECT setval('"public"."meal_type_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."nutrition_id_seq"
OWNED BY "public"."nutrition"."id";
SELECT setval('"public"."nutrition_id_seq"', 29, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."recipe_ingredient_id_seq"
OWNED BY "public"."recipes_ingredients"."id";
SELECT setval('"public"."recipe_ingredient_id_seq"', 92, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."recipes_id_seq"
OWNED BY "public"."recipes"."id";
SELECT setval('"public"."recipes_id_seq"', 62, true);

-- ----------------------------
-- Auto increment value for cuisine
-- ----------------------------
SELECT setval('"public"."cuisine_id_seq"', 7, true);

-- ----------------------------
-- Uniques structure for table cuisine
-- ----------------------------
ALTER TABLE "public"."cuisine" ADD CONSTRAINT "name" UNIQUE ("name");

-- ----------------------------
-- Primary Key structure for table cuisine
-- ----------------------------
ALTER TABLE "public"."cuisine" ADD CONSTRAINT "cuisine_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Auto increment value for diet
-- ----------------------------
SELECT setval('"public"."diet_id_seq"', 5, true);

-- ----------------------------
-- Uniques structure for table diet
-- ----------------------------
ALTER TABLE "public"."diet" ADD CONSTRAINT "type of diet" UNIQUE ("type of diet");

-- ----------------------------
-- Primary Key structure for table diet
-- ----------------------------
ALTER TABLE "public"."diet" ADD CONSTRAINT "diet_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Auto increment value for difficulty
-- ----------------------------
SELECT setval('"public"."difficulty_id_seq"', 3, true);

-- ----------------------------
-- Uniques structure for table difficulty
-- ----------------------------
ALTER TABLE "public"."difficulty" ADD CONSTRAINT "level" UNIQUE ("level");

-- ----------------------------
-- Primary Key structure for table difficulty
-- ----------------------------
ALTER TABLE "public"."difficulty" ADD CONSTRAINT "difficulty_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Auto increment value for ingredients
-- ----------------------------
SELECT setval('"public"."ingredient_id_seq"', 47, true);

-- ----------------------------
-- Uniques structure for table ingredients
-- ----------------------------
ALTER TABLE "public"."ingredients" ADD CONSTRAINT "ingredient name" UNIQUE ("ingredient_name");

-- ----------------------------
-- Primary Key structure for table ingredients
-- ----------------------------
ALTER TABLE "public"."ingredients" ADD CONSTRAINT "ingredient_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Auto increment value for instructions
-- ----------------------------
SELECT setval('"public"."instruction_id_seq"', 101, true);

-- ----------------------------
-- Primary Key structure for table instructions
-- ----------------------------
ALTER TABLE "public"."instructions" ADD CONSTRAINT "instruction_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Auto increment value for meal_type
-- ----------------------------
SELECT setval('"public"."meal_type_id_seq"', 7, true);

-- ----------------------------
-- Uniques structure for table meal_type
-- ----------------------------
ALTER TABLE "public"."meal_type" ADD CONSTRAINT "type" UNIQUE ("type");

-- ----------------------------
-- Primary Key structure for table meal_type
-- ----------------------------
ALTER TABLE "public"."meal_type" ADD CONSTRAINT "meal_type_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Auto increment value for nutrition
-- ----------------------------
SELECT setval('"public"."nutrition_id_seq"', 29, true);

-- ----------------------------
-- Uniques structure for table nutrition
-- ----------------------------
ALTER TABLE "public"."nutrition" ADD CONSTRAINT "id_recipe_uq" UNIQUE ("id_recipe");

-- ----------------------------
-- Primary Key structure for table nutrition
-- ----------------------------
ALTER TABLE "public"."nutrition" ADD CONSTRAINT "nutrition_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Auto increment value for recipes
-- ----------------------------
SELECT setval('"public"."recipes_id_seq"', 62, true);

-- ----------------------------
-- Triggers structure for table recipes
-- ----------------------------
CREATE TRIGGER "trigger_cascade_recipe_delete" AFTER DELETE ON "public"."recipes"
FOR EACH ROW
EXECUTE PROCEDURE "public"."cascade_recipe_delete"();

-- ----------------------------
-- Primary Key structure for table recipes
-- ----------------------------
ALTER TABLE "public"."recipes" ADD CONSTRAINT "recipes_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Auto increment value for recipes_ingredients
-- ----------------------------
SELECT setval('"public"."recipe_ingredient_id_seq"', 92, true);

-- ----------------------------
-- Primary Key structure for table recipes_ingredients
-- ----------------------------
ALTER TABLE "public"."recipes_ingredients" ADD CONSTRAINT "recipe_ingredient_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Auto increment value for users
-- ----------------------------
SELECT setval('"public"."User_id_seq"', 10, true);

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "email" UNIQUE ("email");
ALTER TABLE "public"."users" ADD CONSTRAINT "login" UNIQUE ("login");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "User_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table instructions
-- ----------------------------
ALTER TABLE "public"."instructions" ADD CONSTRAINT "id_recipe" FOREIGN KEY ("id_recipe") REFERENCES "public"."recipes" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table nutrition
-- ----------------------------
ALTER TABLE "public"."nutrition" ADD CONSTRAINT "id_recipe" FOREIGN KEY ("id_recipe") REFERENCES "public"."recipes" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table recipes
-- ----------------------------
ALTER TABLE "public"."recipes" ADD CONSTRAINT "id_cuisine" FOREIGN KEY ("id_cuisine") REFERENCES "public"."cuisine" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."recipes" ADD CONSTRAINT "id_diet" FOREIGN KEY ("id_diet") REFERENCES "public"."diet" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."recipes" ADD CONSTRAINT "id_difficulty" FOREIGN KEY ("id_difficulty") REFERENCES "public"."difficulty" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."recipes" ADD CONSTRAINT "id_meal_type" FOREIGN KEY ("id_meal_type") REFERENCES "public"."meal_type" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table recipes_ingredients
-- ----------------------------
ALTER TABLE "public"."recipes_ingredients" ADD CONSTRAINT "id_ingredient" FOREIGN KEY ("id_ingredient") REFERENCES "public"."ingredients" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."recipes_ingredients" ADD CONSTRAINT "id_recipe" FOREIGN KEY ("id_recipe") REFERENCES "public"."recipes" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table users_recipes
-- ----------------------------
ALTER TABLE "public"."users_recipes" ADD CONSTRAINT "id_recipes" FOREIGN KEY ("id_recipes") REFERENCES "public"."recipes" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."users_recipes" ADD CONSTRAINT "id_users" FOREIGN KEY ("id_users") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
