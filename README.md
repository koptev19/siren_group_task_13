Структура таблицы:

CREATE TABLE `stat_daily` (
  `hash` varchar(100) NOT NULL,
  `date_at` date NOT NULL,
  `status_id` bigint UNSIGNED NOT NULL,
  `deals` bigint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB;
ALTER TABLE `stat_daily` ADD PRIMARY KEY (`hash`);

Сервис по обновлению статистики вынесен в job, так как это может занять определенное время. И не нужно, чтобы клиент ждал это время.
