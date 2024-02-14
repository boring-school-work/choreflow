USE chores_mgt;

-- Create Auth view
CREATE VIEW Auth AS
SELECT CONCAT(fname, ' ', lname) AS fullname, email, passwd, rid FROM People;
