CREATE PROCEDURE `sp_usuarios_insert`(
pdeslogin VARCHAR(264),
pdessenha VARCHAR(264)
)
BEGIN

	INSERT INTO tb_usuarios(deslogin, dessenha) VALUES(pdeslogin, pdessenha);
    
    SELECT * FROM tb_usuarios WHERE idusuario = LAST_INSERT_ID();

END