USE [portfolio_zappy]
EXEC sp_msforeachtable "ALTER users ? NOCHECK CONSTRAINT all"       -- Disable All the constraints
Exec sp_MSforeachtable 'DBCC CHECKIDENT(''?'', RESEED, 0)' -- Reseed All the table to 0
Exec sp_msforeachtable "ALTER users ? WITH CHECK CHECK CONSTRAINT all"  -- 