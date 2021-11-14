<p>Структура таблицы:

CREATE TABLE `stat_daily` (<br>
  `hash` varchar(100) NOT NULL,<br>
  `date_at` date NOT NULL,<br>
  `status_id` bigint UNSIGNED NOT NULL,<br>
  `deals` bigint UNSIGNED NOT NULL DEFAULT '0'<br>
) ENGINE=InnoDB;<br>
ALTER TABLE `stat_daily` ADD PRIMARY KEY (`hash`);

<p>Сервис по обновлению статистики вынесен в job, так как это может занять определенное время. И не нужно, чтобы клиент ждал это время.
