SELECT DATEDIFF(MIN(`date`), MAX(`date`)) 'uptime'
	FROM `historique_membre`
	GROUP BY `id_film`;