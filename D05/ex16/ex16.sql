SELECT COUNT(*)	AS 'films'
	FROM `historique_membre`
	WHERE `date` between '30/10/2006' AND '27/072007'
	OR DAY(`date`) = 24 AND MONTH(`date`) = 12;