-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2025 at 07:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(4) NOT NULL,
  `FULLNAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `PASSWORD` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `FULLNAME`, `EMAIL`, `PASSWORD`) VALUES
(1, 'Rakibul Hassan', 'rakib@gmail.com', 'rakib1234');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `ID` int(4) NOT NULL,
  `FULLNAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `PASSWORD` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`ID`, `FULLNAME`, `EMAIL`, `PASSWORD`) VALUES
(1, 'Ferdous Ahmed Oli', 'oli@gmail.com', 'oli1234');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `ID` int(4) NOT NULL,
  `FULLNAME` text NOT NULL,
  `DATEOFPOST` date NOT NULL,
  `TITLE` text NOT NULL,
  `FULLRECIPE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`ID`, `FULLNAME`, `DATEOFPOST`, `TITLE`, `FULLRECIPE`) VALUES
(1, 'Monir Ahmed', '2025-05-01', 'Milk Tea', 'Start by boiling 1 cup of water in a saucepan. Once it reaches a rolling boil, add 2 teaspoons of black tea leaves (or 1 tea bag) and let it simmer for 2–3 minutes. For a stronger brew, steep a bit longer. Next, pour in 1 cup of whole milk and stir gently. Let the mixture simmer for another 5–6 minutes on medium heat. You’ll notice the color deepen to a rich caramel brown.\r\n\r\nAdd 2–3 teaspoons of sugar (adjust to taste) and stir until fully dissolved. For extra flavor, toss in a pinch of crushed cardamom, a slice of ginger, or a dash of cinnamon totally optional but highly recommended for that aromatic kick.\r\n\r\nOnce the tea is fragrant and creamy, strain it into your favorite mug. Serve hot with biscuits or snacks, or chill it for an iced version. This classic milk tea is smooth, slightly sweet, and deeply satisfying—like a warm hug in a cup.\r\n\r\n'),
(2, 'Mahad', '2024-06-18', 'Poached Egg', 'Fill a microwave-safe mug with **½ cup of water.\r\nCrack in 1 fresh egg gently.\r\nMicrowave on high for 60–90 seconds (start with 60 and check).\r\nUse a spoon to lift it out. Drain and season.\r\nOptional: Add a splash of vinegar to help the whites set better.\r\n\r\n'),
(3, 'Roger', '2025-03-11', 'Fried Rice', 'Ingredients:\r\n- 2 cups **cold cooked rice** (preferably day-old)\r\n- 2 tablespoons **oil** (vegetable or sesame)\r\n- 2 **eggs**, lightly beaten\r\n- ½ cup **chopped onion**\r\n- 1 cup **mixed vegetables** (like peas, carrots, corn)\r\n- 2 tablespoons **soy sauce**\r\n- 1 teaspoon **oyster sauce** (optional, for depth)\r\n- Salt and pepper to taste\r\n- 2 tablespoons **chopped green onions** (for garnish)\r\n\r\n### Instructions:\r\n1. Heat 1 tbsp oil in a wok or large pan over medium-high heat.\r\n2. Add the eggs and scramble until just set. Remove and set aside.\r\n3. Add the remaining oil, then sauté onions until translucent.\r\n4. Toss in the vegetables and stir-fry for 2–3 minutes.\r\n5. Add the rice, breaking up any clumps. Stir-fry for another 2 minutes.\r\n6. Return the eggs to the pan, add soy sauce, oyster sauce, salt, and pepper. Mix well.\r\n7. Garnish with green onions and serve hot.\r\n\r\n'),
(4, 'Ferdous Ahmed Oli', '2025-06-26', 'vanilla cake', 'Ingredients:\r\n- 2½ cups all-purpose flour  \r\n- 2½ tsp baking powder  \r\n- ½ tsp salt  \r\n- ¾ cup unsalted butter (room temp)  \r\n- 1¾ cups granulated sugar  \r\n- 4 large eggs  \r\n- 1 tbsp vanilla extract  \r\n- 1 cup whole milk (room temp)\r\n\r\nInstructions:\r\n1. Preheat your oven to 350°F (175°C). Grease and line two 8-inch round cake pans.\r\n2. In a bowl, whisk together flour, baking powder, and salt.\r\n3. In another bowl, cream the butter and sugar until light and fluffy (about 3–4 minutes).\r\n4. Add eggs one at a time, beating well after each. Stir in vanilla.\r\n5. **Alternate adding the dry ingredients and milk to the butter mixture, starting and ending with the dry mix. Mix until just combined—don’t overmix!\r\n6. Divide the batter evenly between the pans and bake for 30–35 minutes, or until a toothpick comes out clean.\r\n7. Let cool in pans for 10 minutes, then transfer to a wire rack to cool completely.'),
(5, 'Ferdous Ahmed Oli', '2025-06-26', 'Omelette', 'Ingredients:\r\n- 2 eggs  \r\n- 2 tablespoons milk (optional, for fluffiness)  \r\n- 1 heaped teaspoon butter  \r\n- Salt and pepper to taste  \r\n- Optional fillings: cheese, mushrooms, onions, spinach, ham, etc.\r\n\r\nInstructions:\r\n1. **Beat the eggs**: Crack the eggs into a bowl, add milk, salt, and pepper. Whisk until well combined.\r\n2. **Heat the pan**: Place a non-stick pan over medium heat and melt the butter, swirling to coat the surface.\r\n3. **Cook the eggs**: Pour in the egg mixture. As it starts to set, gently push the cooked edges toward the center with a spatula, letting the uncooked egg flow to the edges.\r\n4. **Add fillings**: When the top is still slightly runny, sprinkle your desired fillings over one half.\r\n5. **Fold and finish**: Fold the omelette in half over the fillings. Let it cook for another minute, then slide it onto a plate.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(4) NOT NULL,
  `FULLNAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `DATEOFBIRTH` date NOT NULL,
  `PASSWORD` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FULLNAME`, `EMAIL`, `DATEOFBIRTH`, `PASSWORD`) VALUES
(1, 'Ahsanul Ekram Sahil', 'sahil@gmail.com', '2000-01-01', 'sahil1234'),
(2, 'Zamal Khan', 'zamal@gmail.com', '2001-02-10', 'zamal1234'),
(3, 'Ahsanul Ekram', 'ahsanul@gmail.com', '2001-10-01', 'ahsanul1234'),
(4, 'Oli Ahmed', 'oli@gmail.com', '2025-06-26', 'oli1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
