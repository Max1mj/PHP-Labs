-- Adminer 4.8.1 PostgreSQL 13.2 (Debian 13.2-1.pgdg100+1) dump

DROP TABLE IF EXISTS "users";
DROP SEQUENCE IF EXISTS users_id_seq;
CREATE SEQUENCE users_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."users" (
    "id" integer DEFAULT nextval('users_id_seq') NOT NULL,
    "username" character varying(50),
    "email" character varying(100),
    "password" character varying(255),
    CONSTRAINT "users_email_key" UNIQUE ("email"),
    CONSTRAINT "users_pkey" PRIMARY KEY ("id"),
    CONSTRAINT "users_username_key" UNIQUE ("username")
) WITH (oids = false);

INSERT INTO "users" ("id", "username", "email", "password") VALUES
(1,	'Jalk',	'smith@gmail.com',	'$2y$10$ThSJETIGiP7wBM/C7rlZFepBrzxplHCANd6R87bHuQPyWC7pexeAK'),
(2,	'jonny',	'jj@gmail.com',	'$2y$10$eY16inhCduG69w2JmNV37uha7OZJGFmx69I6FvkDcsNYyOFgdUHi.'),
(3,	'jonny2',	'j2j2_@gmail.com',	'$2y$10$pb.aMQc9WKP8NWj.egWuk.3C1/lguzVFj6qAodGefAF7oYhCMFYl.');

-- 2025-04-10 21:06:07.088524+00