
CREATE TABLE IF NOT EXISTS `users` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
                                                                                                          (1, 'Chris', 'madeye92@hotmail.com', '$2y$10$cyH0I4Y2QmUKX1zcvDo/CO32md0v7yJlPr/S6Xoa89DKLAlrHorUa', 'm2RraXSWXDFrlNsRBJKCQAW5u38pHhptjj0GH2S1GFZ7RGZ1B15wB5fKKP1c', '2017-02-27 06:12:41', '2017-02-27 06:12:41'),
                                                                                                          (2, 'Christopher', 'chawker21@gmail.com', '$2y$10$olZGXXJf/V4Qs6DzkUgbaO7kpDRcySZmP0eSHPM0sixHjw7Va.8xK', 'WPa5ziaCqBRdOTfdKQoDjAqiYzP94l9kfDhGaZTHK9cG01saa1srsdyC8EKv', '2017-02-27 06:13:12', '2017-02-27 06:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_additional_informations`
--

CREATE TABLE IF NOT EXISTS `vehicle_additional_informations` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `customer_vehicle_id` int(11) NOT NULL,
    `Additional_note` varchar(600) DEFAULT NULL,
    `updated_at` varchar(100) DEFAULT NULL,
    `created_at` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `vehicle_additional_informations`
--

INSERT INTO `vehicle_additional_informations` (`id`, `customer_vehicle_id`, `Additional_note`, `updated_at`, `created_at`) VALUES
                                                                                                                               (4, 151, 'Front Differential', '2017-01-17 16:30:03', '2017-01-17 16:30:03'),
                                                                                                                               (18, 896, 'test', '2017-01-25 23:15:39', '2017-01-25 23:15:39'),
                                                                                                                               (19, 896, 'test', '2017-01-25 23:20:44', '2017-01-25 23:20:44'),
                                                                                                                               (20, 277, 'Rack and Pinion, Estimate', '2017-01-31 02:36:43', '2017-01-31 02:36:43'),
                                                                                                                               (21, 996, 'P0106 Manifold absolute pressure\r\nP0442 Evap Emission control system', '2017-01-31 16:14:55', '2017-01-31 16:14:55'),
                                                                                                                               (22, 344, 'p0171 p0174 p2196 p0308', '2017-01-31 20:04:46', '2017-01-31 20:04:46'),
                                                                                                                               (23, 997, 'Front Brakes and Rotors', '2017-01-31 20:37:13', '2017-01-31 20:37:13'),
                                                                                                                               (24, 1000, 'test vehicle not on new vehicle', '2017-02-01 04:11:02', '2017-02-01 04:11:02'),
                                                                                                                               (25, 1001, 'Rear View Camera has no signal', '2017-02-01 16:38:56', '2017-02-01 16:38:56'),
                                                                                                                               (26, 1002, 'Rack and Pinion Failed safety inspection, leaking out of passenger side seal. \r\n\r\nShocks advise, all 4 leaking.\r\n\r\nComplaint of noise over bumps, possible sway bar link\r\n\r\nadvise LF CV Axle', '2017-02-01 17:47:49', '2017-02-01 17:47:49'),
                                                                                                                               (27, 1003, ' Windshield washer does not spray Bringing car in 2/2/2017 10am\r\n', '2017-02-01 20:31:44', '2017-02-01 20:31:44'),
                                                                                                                               (28, 1004, 'Had battery issues, lights clicking and wouldnt start, now windshield wipers dont work.', '2017-02-01 20:39:13', '2017-02-01 20:39:13'),
                                                                                                                               (29, 1005, ' p0410 secondary air system Customer will bring car in 2/3/2017 ', '2017-02-01 21:08:48', '2017-02-01 21:08:48'),
                                                                                                                               (30, 825, '	Has P0171 p0174 lean codes, came in for windshield wipers not working they think there is a short electrically. works at va hospital hard to get a hold of Call Husband ', '2017-02-02 16:02:22', '2017-02-02 16:02:22'),
                                                                                                                               (31, 825, 'Battery and Charging system Checks Good, could use Belt', '2017-02-02 16:03:03', '2017-02-02 16:03:03'),
                                                                                                                               (32, 1002, 'Replaced Front and Rear Shocks, Had RF wheel speed sensor circuit code when finished, replaced sensor harness.', '2017-02-02 16:14:03', '2017-02-02 16:14:03'),
                                                                                                                               (33, 825, 'Found Blown Fuse for wipers and pump, also blown fuse for door chime', '2017-02-02 16:32:34', '2017-02-02 16:32:34'),
                                                                                                                               (34, 1001, 'Sold Truck As Is.  Buyer said would fix Camera Himself', '2017-02-02 17:09:17', '2017-02-02 17:09:17'),
                                                                                                                               (35, 995, 'Air Intake Boot Ordered from Amazon, Feb 6-8 delivery expected', '2017-02-02 17:09:51', '2017-02-02 17:09:51'),
                                                                                                                               (36, 1008, '  Air Intake Boot Ordered from Amazon, Feb 6-8 delivery expected ', '2017-02-02 17:13:06', '2017-02-02 17:13:06'),
                                                                                                                               (37, 1008, ' P0171 P0174 Air Intake Boot Tore, ordered from amazon. 44.44 ', '2017-02-02 17:13:36', '2017-02-02 17:13:36'),
                                                                                                                               (38, 1009, 'Windshield washer pump not working, Found Pump Unplugged, plugged in and works fine.', '2017-02-02 17:34:28', '2017-02-02 17:34:28'),
                                                                                                                               (39, 850, 'Replaced Rear Driver side Wheel Bearing and Wheel Speed sensor.  Added Oil Change', '2017-02-02 18:08:54', '2017-02-02 18:08:54'),
                                                                                                                               (40, 1010, '	Replaced Washer Nozzles, and Repaired Power Steering Line for Safety inspection ', '2017-02-02 18:13:48', '2017-02-02 18:13:48'),
                                                                                                                               (41, 848, 'Replaced Front Left CV Axle, adjusted Clutch', '2017-02-02 18:19:57', '2017-02-02 18:19:57'),
                                                                                                                               (42, 282, 'Tune Up, Spark Plugs, Wireset, Ignition Coil', '2017-02-02 18:24:38', '2017-02-02 18:24:38'),
                                                                                                                               (43, 1011, 'Tune Up, Wireset, Spark Plugs, and Ignition Coil', '2017-02-02 18:25:39', '2017-02-02 18:25:39'),
                                                                                                                               (44, 336, 'Rear Brake Pads and Rotors', '2017-02-02 18:28:04', '2017-02-02 18:28:04'),
                                                                                                                               (45, 1012, 'Front Brake Pads, Low Beam Headlight Bulbs', '2017-02-02 18:30:34', '2017-02-02 18:30:34'),
                                                                                                                               (46, 1013, 'Rear Brake Pads and Adjust Ebrake for safety inspection', '2017-02-02 18:33:09', '2017-02-02 18:33:09'),
                                                                                                                               (47, 1014, 'Starter, Brake Pads Rear', '2017-02-02 18:34:55', '2017-02-02 18:34:55'),
                                                                                                                               (48, 1015, 'Front and Rear brakes and Rotors', '2017-02-02 18:37:03', '2017-02-02 18:37:03'),
                                                                                                                               (49, 1016, 'Replaced both front Oxygen Sensors', '2017-02-02 18:40:41', '2017-02-02 18:40:41'),
                                                                                                                               (50, 1017, 'Replaced Front Drivers Side Wheel Bearing', '2017-02-02 18:42:54', '2017-02-02 18:42:54'),
                                                                                                                               (51, 1018, 'Power Steering Pump', '2017-02-02 20:49:28', '2017-02-02 20:49:28'),
                                                                                                                               (52, 1121, '	Engine Oil Pressure Sensor ', '2017-02-03 16:42:40', '2017-02-03 16:42:40'),
                                                                                                                               (53, 1122, 'Bad Engine, Best Buy supplying engine from Transwest.  Install 750.', '2017-02-03 17:33:35', '2017-02-03 17:33:35'),
                                                                                                                               (54, 1122, '50 dollar tow bill', '2017-02-03 17:34:56', '2017-02-03 17:34:56'),
                                                                                                                               (55, 322, 'Transfer Case Motor,  rebuilt Transfer case, found broken fork, code came back on for motor issue.  ', '2017-02-03 22:14:11', '2017-02-03 22:14:11'),
                                                                                                                               (56, 1123, 'Transfer case was rebuilt, had broken fork, check 4x4 light still on, needs Transfer case motor. motor was ordered and is here.', '2017-02-03 22:15:22', '2017-02-03 22:15:22'),
                                                                                                                               (57, 1137, 'test', '2017-02-04 02:11:16', '2017-02-04 02:11:16'),
                                                                                                                               (58, 1136, 'test2', '2017-02-04 02:17:45', '2017-02-04 02:17:45'),
                                                                                                                               (59, 1122, 'Replaced Thermostat', '2017-02-06 16:51:38', '2017-02-06 16:51:38'),
                                                                                                                               (60, 1144, 'Thermostat', '2017-02-06 19:22:57', '2017-02-06 19:22:57'),
                                                                                                                               (61, 485, 'Windshield washer nozzle replacement', '2017-02-06 20:13:01', '2017-02-06 20:13:01'),
                                                                                                                               (62, 1145, 'Heater Hose connector failed, also replaced belt and tensioner ', '2017-02-06 21:48:41', '2017-02-06 21:48:41'),
                                                                                                                               (63, 1143, 'test', '2017-02-07 01:37:11', '2017-02-07 01:37:11'),
                                                                                                                               (64, 1148, 'Front and Rear Brakes with front rotors\r\n', '2017-02-07 16:54:00', '2017-02-07 16:54:00'),
                                                                                                                               (65, 1150, 'Replaced alternator', '2017-02-07 17:32:23', '2017-02-07 17:32:23'),
                                                                                                                               (66, 825, 'Replaced Starter and Positive battery cable,  bendix loose on starter and corrosion on cable', '2017-02-07 23:02:06', '2017-02-07 23:02:06'),
                                                                                                                               (67, 1145, 'Battery was replaced also', '2017-02-07 23:17:35', '2017-02-07 23:17:35'),
                                                                                                                               (68, 1154, 'Engine Oil Leak, Replaced Drain plug and did oil change.', '2017-02-08 17:41:37', '2017-02-08 17:41:37'),
                                                                                                                               (69, 515, 'P2119 Throttle Actuator Control, Throttle Body range/performance.  Rear Brakes, Exhaust Tail Pipe needs welding\r\n', '2017-02-09 18:05:26', '2017-02-09 18:05:26'),
                                                                                                                               (70, 1156, 'Starter Motor Replacement', '2017-02-10 17:53:49', '2017-02-10 17:53:49'),
                                                                                                                               (71, 388, 'Has bad head gasket and knock sensor, customer drove car home.', '2017-02-13 16:05:56', '2017-02-13 16:05:56'),
                                                                                                                               (72, 1155, 'Replaced all bulbs in headlight assembleys, has wire harness from a custom park avenue on the drivers side which has one less bulb than the limited.  harness is discontinued.', '2017-02-13 16:07:33', '2017-02-13 16:07:33'),
                                                                                                                               (73, 515, 'Replaced Rear brakes and rotors, cleaned throttle body and advised that the muffler has been cut out of exhaust.', '2017-02-13 16:08:43', '2017-02-13 16:08:43'),
                                                                                                                               (74, 1122, 'Replaced engine, didnt charge for tow, overlooked', '2017-02-13 16:09:46', '2017-02-13 16:09:46'),
                                                                                                                               (75, 1123, 'Replaced Transfer case motor. ', '2017-02-13 16:10:32', '2017-02-13 16:10:32'),
                                                                                                                               (76, 1158, 'Rear Brakes and Rotors, Front Brakes, Ball Joints upper and lower on Passenger side, wheel bearing on Drivers side.  ', '2017-02-13 16:17:24', '2017-02-13 16:17:24'),
                                                                                                                               (77, 691, 'Brake Check, Bringing in Monday 2/20 12pm', '2017-02-13 23:44:30', '2017-02-13 23:44:30'),
                                                                                                                               (78, 1159, ' Spark Plug blew out 3rd one back on drivers side ', '2017-02-14 00:01:08', '2017-02-14 00:01:08'),
                                                                                                                               (79, 1159, 'cyl 10 was plug that blew out', '2017-02-14 00:01:26', '2017-02-14 00:01:26'),
                                                                                                                               (80, 1167, 'Battery Terminals need replacing, Brake Check and previously had belt noise, gone now but check.', '2017-02-14 16:27:24', '2017-02-14 16:27:24'),
                                                                                                                               (81, 997, 'Water pump', '2017-02-14 22:09:31', '2017-02-14 22:09:31'),
                                                                                                                               (82, 1169, 'Grinding when in Reverse.  Brake Pads 3/32 front and rear.', '2017-02-15 16:54:38', '2017-02-15 16:54:38'),
                                                                                                                               (83, 1171, 'engine', '2017-02-23 23:17:16', '2017-02-23 23:17:16'),
                                                                                                                               (84, 1179, 'ml320', '2017-03-03 15:12:57', '2017-03-03 15:12:57'),
                                                                                                                               (85, 515, 'P0507 Idle higher than expected', '2017-03-08 16:20:57', '2017-03-08 16:20:57'),
                                                                                                                               (86, 1207, 'Blower Motor, serpentine Belt and grinding noise in right front when taking off from stop\r\n', '2017-03-08 17:26:04', '2017-03-08 17:26:04'),
                                                                                                                               (87, 1210, 'Front Brakes and Rotors', '2017-03-08 23:28:33', '2017-03-08 23:28:33'),
                                                                                                                               (88, 174, 'bringing new nissan in tuesday at 9am for leveling kit install while waiting\r\n', '2017-03-09 22:33:35', '2017-03-09 22:33:35'),
                                                                                                                               (89, 62, 'Front Brake Lines Split and leaking', '2017-03-13 15:04:57', '2017-03-13 15:04:57'),
                                                                                                                               (90, 1217, 'will bring car in on Friday 3/18', '2017-03-13 15:42:10', '2017-03-13 15:42:10'),
                                                                                                                               (91, 1221, 'Coolant Hose and Brakes', '2017-03-13 21:21:49', '2017-03-13 21:21:49'),
                                                                                                                               (92, 1224, 'Install customers lift kit', '2017-03-14 17:48:27', '2017-03-14 17:48:27');
