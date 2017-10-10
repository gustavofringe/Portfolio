<?php
return [
    "paths" => [
        "migrations" => "db/migrations",
        "seeds" => "db/seeds"
    ],
    "environments" => [
        "default_migration_table" => "phinxlog",
        "default_database" => "dev",
        "dev" => [
            "name" => "dev_db",
            "connection" => Model::$db
        ]
    ]
];
