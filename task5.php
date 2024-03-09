<!DOCTYPE html>
<html>
	<head>
		<title>Task 5</title>
	</head>
	
	<body>
		<?php include 'menu.inc'; ?>
		<h1>Task 5</h1>

		<h3>vendors table</h3>
		<p>A vendor is a stakeholder in the supply chain that makes goods and services available
			to companies and consumers.
			This table houses all the details for each vendor.
			Each vendor is also linked to the generalLedgerAccounts table with an account number
			and the terms and invoices tables respectively with a term's id number.
		<br><strong>Primary Keys:</strong><br>
			• vendorID
		<br><strong>Foreign Keys:</strong><br>
			• defaultTermsID<br>
			• defaultAccNo
		<br></p>

		<h3>invoices table</h3>
		<p>An invoice is a time-stamped document that itemizes and records a transaction between a seller and a buyer.
			This table represents the details for each individual invoice created with details contained
			per invoice. It also has a vendor id related to the vendor and a terms id linked to the
			vendors and term's tables respectively.
		<br><strong>Primary Keys:</strong><br>
			• invoiceID
		<br><strong>Foreign Keys:</strong><br>
			• vendorID<br>
			• termsID
		<br></p>

		<h3>terms table</h3>
		<p>Terms relate to a fixed time period and details related to an agreement.
			This table contains the terms for vendors related also to the invoices table.
		<br><strong>Primary Keys:</strong><br>
			• termsID
		<br><strong>Foreign Keys:</strong><br>
			• None
		<br></p>

		<h3>invoicesLineItems table</h3>
		<p>This is a relationship table used to house general details relating to the invoice
			and line items. Its also related to the vendors generalLedgerAccounts account number.
		<br><strong>Primary Keys:</strong><br>
			• invoiceID<br>
			• invoiceSequence
		<br><strong>Foreign Keys:</strong><br>
			• accountNo
		<br></p>

		<h3>generalLedgerAccounts table</h3>
		<p>The general ledger is used to keep record of a company's total financial accounts.
			This table is used to give each vendor an account number and a description of the account.
		<br><strong>Primary Keys:</strong><br>
			• accountNo
		<br><strong>Foreign Keys:</strong><br>
			• None
		<br></p>
		<iframe src="task5.txt" height="400" scrolling="yes" width="1200px">
			<p>Your browser does not support iframes.</p>
		</iframe>
	</body>
</html>