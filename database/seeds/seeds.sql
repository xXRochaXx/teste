\c melhorias

\i seeds/areas.sql

INSERT INTO melhorias (area, descricao, prazo_acordado, prazo_legal, demanda_legal, gravidade, urgencia, tendencia) VALUES 
    ((SELECT id FROM area WHERE descricao ilike 'Tributário'),     '', '2019-12-31', null,         'f', null, 1, null),
    ((SELECT id FROM area WHERE descricao ilike 'Tributário'),     '', '2019-04-30', null,         'f', null, 5, null),
    ((SELECT id FROM area WHERE descricao ilike 'Tributário'),     '', '2019-05-31', null,         'f', null, 5, null),
    ((SELECT id FROM area WHERE descricao ilike 'Tributário'),     '', '2019-04-30', null,         'f', null, 5, null),
    ((SELECT id FROM area WHERE descricao ilike 'Tributário'),     '', '2019-08-28', null,         'f', null, 5, null),
    ((SELECT id FROM area WHERE descricao ilike 'Saúde'),          '', '2019-08-28', null,         'f', null, 4, null),
    ((SELECT id FROM area WHERE descricao ilike 'Saúde'),          '', '2019-03-28', null,         'f', null, 4, null),
    ((SELECT id FROM area WHERE descricao ilike 'Saúde'),          '', '2019-12-31', null,         'f', null, 4, null),
    ((SELECT id FROM area WHERE descricao ilike 'Saúde'),          '', null,         '2019-05-31', 'f', null, 3, null),
    ((SELECT id FROM area WHERE descricao ilike 'Saúde'),          '', null,         '2019-06-30', 'f', null, 4, null),
    ((SELECT id FROM area WHERE descricao ilike 'Patrimonial'),    '', null,         '2019-05-02', 'f', null, 5, null),
    ((SELECT id FROM area WHERE descricao ilike 'Patrimonial'),    '', null,         '2019-05-30', 'f', null, 1, null),
    ((SELECT id FROM area WHERE descricao ilike 'Patrimonial'),    '', '2019-05-31', null,         't', null, 4, null),
    ((SELECT id FROM area WHERE descricao ilike 'Patrimonial'),    '', '2019-12-31', null,         't', null, 1, null),
    ((SELECT id FROM area WHERE descricao ilike 'Patrimonial'),    '', '2019-04-30', null,         'f', null, 4, null),
    ((SELECT id FROM area WHERE descricao ilike 'Folha'),          '', '2019-05-31', null,         't', null, 5, null),
    ((SELECT id FROM area WHERE descricao ilike 'Folha'),          '', '2019-04-30', null,         'f', null, 3, null),
    ((SELECT id FROM area WHERE descricao ilike 'Folha'),          '', '2019-08-28', null,         'f', null, 4, null),
    ((SELECT id FROM area WHERE descricao ilike 'Folha'),          '', '2019-08-28', null,         'f', null, 3, null),
    ((SELECT id FROM area WHERE descricao ilike 'Folha'),          '', '2019-03-28', null,         'f', null, 5, null),
    ((SELECT id FROM area WHERE descricao ilike 'Financeiro'),     '', '2019-12-31', null,         'f', null, 4, null),
    ((SELECT id FROM area WHERE descricao ilike 'Financeiro'),     '', '2019-05-31', null,         'f', null, 4, null),
    ((SELECT id FROM area WHERE descricao ilike 'Financeiro'),     '', '2019-06-30', null,         'f', null, 4, null),
    ((SELECT id FROM area WHERE descricao ilike 'Financeiro'),     '', null,         '2019-05-02', 'f', null, 4, null),
    ((SELECT id FROM area WHERE descricao ilike 'Financeiro'),     '', null,         '2019-05-30', 'f', null, 4, null),
    ((SELECT id FROM area WHERE descricao ilike 'Educação'),       '', null,         '2019-05-31', 'f', null, 2, null),
    ((SELECT id FROM area WHERE descricao ilike 'Educação'),       '', null,         '2019-08-28', 'f', null, 3, null),
    ((SELECT id FROM area WHERE descricao ilike 'Educação'),       '', '2019-08-28', null,         't', null, 3, null),
    ((SELECT id FROM area WHERE descricao ilike 'Educação'),       '', '2019-03-28', null,         't', null, 5, null),
    ((SELECT id FROM area WHERE descricao ilike 'Educação'),       '', null,         '2019-12-31', 't', null, 5, null),
    ((SELECT id FROM area WHERE descricao ilike 'Configurações'),  '', null,         '2019-05-31', 'f', null, 1, null),
    ((SELECT id FROM area WHERE descricao ilike 'Configurações'),  '', null,         '2019-06-30', 'f', null, 1, null),
    ((SELECT id FROM area WHERE descricao ilike 'Configurações'),  '', '2019-05-02', null,         'f', null, 1, null),
    ((SELECT id FROM area WHERE descricao ilike 'Configurações'),  '', '2019-05-30', null,         'f', null, 5, null),
    ((SELECT id FROM area WHERE descricao ilike 'Configurações'),  '', '2019-05-31', null,         'f', null, 5, null)
;

\i seeds/after.sql