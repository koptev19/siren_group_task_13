<p>Идея преобразования состоит в том, что на модель Deal вешается DealObserver, который кладет в очередь задание на обновление статистики при любом добалении/обновлении/удалении модели Deal. Конечно, это не решает проблему, если где-то в коде идет обновление так: DB::table('deals')->update(...), но таких записей нужно избегать.
  
<p>Далее при построении отчета данные берутся из этой таблицы. В ней записей не порядок меньше, чем в deals.
  
<p>Сервис по обновлению статистики вынесен в job, так как это может занять определенное время. И не нужно, чтобы клиент ждал это время.

<p>Структура таблицы:

<p>
  CREATE TABLE `stat_daily` (<br>
  `hash` varchar(100) NOT NULL,<br>
  `date_at` date NOT NULL,<br>
  `status_id` bigint UNSIGNED NOT NULL,<br>
  `deals` bigint UNSIGNED NOT NULL DEFAULT '0'<br>
) ENGINE=InnoDB;<br>
ALTER TABLE `stat_daily` ADD PRIMARY KEY (`hash`);<br>
ALTER TABLE `stat_daily` ADD UNIQUE KEY `date_at` (`date_at`,`status_id`);


