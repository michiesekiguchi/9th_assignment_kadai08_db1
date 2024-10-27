INSERT INTO gs_kadai_an_table(id,username,bookname,bookurl,comment,indate)VALUES(NULL,'test1','test1','test1','test1',sysdate());

INSERT INTO gs_kadai_an_table(id,username,bookname,bookurl,comment,indate)VALUES(NULL,'test2','test2','test2','test2',sysdate());

INSERT INTO gs_kadai_an_table(id,username,bookname,bookurl,comment,indate)VALUES(NULL,:username,:bookname,:bookurl,:comment,sysdate());

SELECT * FROM gs_kadai_an_table;
