CREATE TABLE `companies` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mod` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `companies` (`id`, `name`, `mod`) VALUES
(1, 'Desa Southen Agency', 'DSA'),
(2, 'Desa Southen Food', 'DSF');

CREATE TABLE `dsa_history` (
  `id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `renewal_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `dsa_history` (`id`, `license_id`, `renewal_date`, `update_date`, `update_by`, `remark`) VALUES
(1, 1, '2024-07-18', '2024-07-18', 'admin', 'Lesen JPP2077');

CREATE TABLE `dsa_licenses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `license_number` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `dsa_licenses` (`id`, `user_id`, `license_number`, `supplier`, `expired_date`) VALUES
(1, 1, 'LN-001', 'Impian Emas', '2024-07-25'),
(2, 1, 'LN-002', 'Permata Harapan', '2024-08-18'),
(3, 2, 'LN-201', 'Impian Emas', '2024-08-01');

CREATE TABLE `dsf_history` (
  `id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `renewal_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `dsf_licenses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `license_number` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `mb_history` (
  `id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `renewal_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `mb_licenses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `license_number` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `mmf_history` (
  `id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `renewal_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `mmf_licenses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` varchar(32) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `verification_code`, `verified`, `created_at`) VALUES
(1, 'admin', 'admin@example.com', 'admin', 'qwerty', 1, '2024-07-18 05:49:44'),
(2, 'user', 'user@example.com', 'user', 'ytrewq', 1, '2024-07-18 05:49:44');

CREATE TABLE `user_companies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `user_companies` (`id`, `user_id`, `company_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1);

ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dsa_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `license_id` (`license_id`);

ALTER TABLE `dsa_licenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `dsf_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `license_id` (`license_id`);

ALTER TABLE `dsf_licenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `mb_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `license_id` (`license_id`);

ALTER TABLE `mb_licenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `mmf_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `license_id` (`license_id`);

ALTER TABLE `mmf_licenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `user_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_id` (`company_id`);

ALTER TABLE `companies`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `dsa_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `dsa_licenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `dsf_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `dsf_licenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `mb_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `mb_licenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `mmf_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `mmf_licenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `user_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
