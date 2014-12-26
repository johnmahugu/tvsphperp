CREATE TABLE `crm_2013_14` (
`crm_id` int(10) NOT NULL AUTO_INCREMENT,
`name` varchar(100) NOT NULL,
`adm` int(10) NOT NULL,
`class` varchar(10) NOT NULL,
`class_teacher` varchar(500) NOT NULL,
`class_teacher_grade` varchar(5) NOT NULL,
`class_teacher_teacher` varchar(50) NOT NULL,
`house_parent` varchar(500) NOT NULL,
`house_parent_grade` varchar(5) NOT NULL,
`house_parent_teacher` varchar(50) NOT NULL,
`english` varchar(500) NOT NULL,
`english_grade` varchar(5) NOT NULL,
`english_teacher` varchar(50) NOT NULL,
`hindi` varchar(500) NOT NULL,
`hindi_grade` varchar(5) NOT NULL,
`hindi_teacher` varchar(50) NOT NULL,
`social_studies` varchar(500) NOT NULL,
`social_studies_grade` varchar(5) NOT NULL,
`social_studies_teacher` varchar(50) NOT NULL,
`maths` varchar(500) NOT NULL,
`maths_grade` varchar(5) NOT NULL,
`maths_teacher` varchar(50) NOT NULL,
`science` varchar(500) NOT NULL,
`science_grade` varchar(5) NOT NULL,
`science_teacher` varchar(50) NOT NULL,
`resource_room` varchar(500) NOT NULL,
`resource_room_grade` varchar(5) NOT NULL,
`resource_room_teacher` varchar(50) NOT NULL,
`games` varchar(500) NOT NULL,
`games_grade` varchar(5) NOT NULL,
`games_teacher` varchar(50) NOT NULL,
`yoga` varchar(500) NOT NULL,
`yoga_grade` varchar(5) NOT NULL,
`yoga_teacher` varchar(50) NOT NULL,
`art` varchar(500) NOT NULL,
`art_grade` varchar(5) NOT NULL,
`art_teacher` varchar(50) NOT NULL,
`music` varchar(500) NOT NULL,
`music_grade` varchar(5) NOT NULL,
`music_teacher` varchar(50) NOT NULL,
`remarks` varchar(500) NOT NULL,
`inputs_from_crm` varchar(500) NOT NULL,
`inputs_from_ptm` varchar(500) NOT NULL,
`last_update_date` date NOT NULL,
`last_update_teacher` varchar(50) NOT NULL,
PRIMARY KEY (`crm_id`)
);
