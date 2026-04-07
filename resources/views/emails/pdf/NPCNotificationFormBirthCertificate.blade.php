<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NPC Notification Foreign Birth Certificate Registration Form</title>
    <style>
        @media print {
            body { margin: 0; }
            .no-print { display: none; }
        }
        
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            max-width: 210mm;
            margin: 0 auto;
            
            background: white;
            color: black;
        }
        
        .header {
            text-align: center;
            margin-bottom: 10px;
            border-bottom: 2px solid black;
            padding-bottom: 5px;
        }
        
        .header h1 {
            font-size: 16px;
            font-weight: bold;
            margin: 5px 0;
            text-transform: uppercase;
        }
        
        .header h2 {
            font-size: 14px;
            font-weight: bold;
            margin: 2px 0;
            text-transform: uppercase;
        }
        
        .note {
            font-style: italic;
            font-size: 11px;
            margin: 10px 0;
        }
        
        .section {
            margin: 25px 0;
            border: 1px solid black;
            padding: 15px;
        }
        
        .section-title {
            font-weight: bold;
            font-size: 14px;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 20px;
            text-decoration: underline;
        }
        
        .form-row {
            margin: 12px 0;
            display: flex;
            align-items: center;
        }
        
        .form-number {
            font-weight: bold;
            width: 30px;
            flex-shrink: 0;
        }
        
        .form-label {
            font-weight: bold;
            margin-right: 10px;
        }
        
        .form-line {
            border-bottom: 1px solid black;
            min-width: 200px;
            height: 18px;
            margin: 0 5px;
            flex-grow: 1;
        }
        
        .form-line-short {
            border-bottom: 1px solid black;
            width: 60px;
            height: 18px;
            margin: 0 5px;
            display: inline-block;
        }
        
        .form-line-medium {
            border-bottom: 1px solid black;
            width: 120px;
            height: 18px;
            margin: 0 5px;
            display: inline-block;
        }
        
        .checkbox-options {
            margin-left: 10px;
        }
        
        .signature-section {
            margin-top: 40px;
            border-top: 1px solid black;
            padding-top: 20px;
        }
        
        .signature-line {
            border-bottom: 1px solid black;
            width: 300px;
            height: 18px;
            display: inline-block;
        }
        
        .print-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
           
        }
        
        .print-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
    <div class="header">
        <h1>NINUK</h1>
        <h2>NOTIFICATION FORM (FOREIGN BIRTH CERTIFICATE) REGISTRATION</h2>
        <div class="note">(All Entries in Block Letters)</div>
    </div>
    <div class="header">
        
        <h2>Reference No : {{$data['appointment']->ref}}</h2>
        <h2>Booked Date : {{$data['date']->format("M d, Y h:i A")}}</h2>
    </div>


    <div class="section">
        <div class="section-title">PARTICULARS OF CHILD</div>
        
        <div class="form-row">
            <span class="form-number">1.</span>
            <span class="form-label">Surname First</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">2.</span>
            <span class="form-label">First Name</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">3.</span>
            <span class="form-label">Middle Name</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">4.</span>
            <span class="form-label">Date of Birth</span>
            Day<div class="form-line-short"></div>
            Month<div class="form-line-short"></div>
            Year<div class="form-line-short"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">5.</span>
            <span class="form-label">Sex:</span>
            <span class="checkbox-options">Male/Female</span>
        </div>
        
        <div class="form-row">
            <span class="form-number">6.</span>
            <span class="form-label">Type of Birth; Single/Multiple</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">7.</span>
            <span class="form-label">Birth Order(first born or second born, etc)</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">8.</span>
            <span class="form-label">Place of occurrence:</span>
            Maternity Home/Hospital/At Home/Others (Specify)
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">9.</span>
            <span class="form-label">Country of birth:</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">10.</span>
            <span class="form-label">State/City/Province of birth:</span>
            <div class="form-line"></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">PARTICULARS OF MOTHER</div>
        
        <div class="form-row">
            <span class="form-number">11.</span>
            <span class="form-label">Surname First</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">12.</span>
            <span class="form-label">First Name</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">13.</span>
            <span class="form-label">Maiden Name</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">14.</span>
            <span class="form-label">Date of Birth</span>
            Day<div class="form-line-short"></div>
            Month<div class="form-line-short"></div>
            Year<div class="form-line-short"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">15.</span>
            <span class="form-label">Nationality:</span>
            <div class="form-line"></div>
            <span class="form-label">Ethnic Origin</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">16.</span>
            <span class="form-label">Level of Education</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">17.</span>
            <span class="form-label">Address of Residence</span>
            <div class="form-line"></div>
          
        </div>
        
        <div class="form-row">
            <span class="form-number">18.</span>
            <span class="form-label">Age:</span>
            <div class="form-line"></div>
            <span class="form-label">Place Of Resdidence</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">19.</span>
            <span class="form-label">Country:</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">20.</span>
            <span class="form-label">LGA/City/Province:</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">21.</span>
            <span class="form-label">Marital Status:</span>
            <span class="checkbox-options">Single/Married/Separation/Divorced/Widowed</span>
        </div>
        
        <div class="form-row">
            <span class="form-number">22.</span>
            <span class="form-label">Occupation</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">23.</span>
            <span class="form-label">NIN</span>
            <div class="form-line"></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">PARTICULARS OF FATHER</div>
        
        <div class="form-row">
            <span class="form-number">24.</span>
            <span class="form-label">Surname First</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">25.</span>
            <span class="form-label">First Name</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">26.</span>
            <span class="form-label">Maiden Name</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">27.</span>
            <span class="form-label">Nationality:</span>
            <div class="form-line"></div>
            <span class="form-label">Ethnic Group</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">28.</span>
            <span class="form-label">Address of Residence</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">29.</span>
            <span class="form-label">Age:</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">30.</span>
            <span class="form-label">Country:</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">31.</span>
            <span class="form-label">State/City/Province:</span>
            <div class="form-line"></div>
            <span class="form-label">LGA</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">32.</span>
            <span class="form-label">Marital Status:</span>
            <span class="checkbox-options">Single/Married/Separation/Divorced/Widowed</span>
        </div>
        
        <div class="form-row">
            <span class="form-number">33.</span>
            <span class="form-label">Level of Education</span>
            <div class="form-line"></div>
        </div>
        
        <div class="form-row">
            <span class="form-number">34.</span>
            <span class="form-label">NIN</span>
            <div class="form-line"></div>
        </div>
    </div>
    
    <div class="section">
        <div class="section-title">PAYMENT INFORMATION AND DIRECTION</div>
        
        <p>To process your application, please:</p>

        <ol>
            <li>Make a payment of £{{$data['appointment']->amount}} to NINUK Ltd by transfer or BACS to Our Business Bank Account:
                <br>Bank Name: Monzo
                <br>SortCode: 040006
                <br>Account No: 46844649
                <br>Note: State your reference No: 0863494593 as description during payment for easy processing.
            </li>
            <br>
            <li>Fill this form, attach your passport photograph with the filled form and send it to our email: info@ninuk.co.uk</li>
            <li>Your Birth or Attestation of Birth Certificate will be out within 48hrs after we recieve your form and verify your payment.</li>
            <li>Need any help, email: info@ninuk.co.uk or call +44 (0) 2032474747</li>
        </ol>
    </div>
    <div class="signature-section">
        <span class="form-label">Signature:</span>
        <div class="signature-line"></div>
    </div>
</body>
</html>