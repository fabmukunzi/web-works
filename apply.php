<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job Application Form</title>
    <link rel="stylesheet" href="styles/styles.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
    <style>
      form {
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
      }
      input,
      textarea {
        width: 500px;
        padding: 12px;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 8px;
      }
      form .secondary-btn{
        width: 500px;
        padding: 12px;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 8px;
      }
    </style>
  </head>
  <body>
    <?php
    include("./header.php");
    ?>
    <form action="handleApply.php?job_id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
      <h2>Fill Below Informations To Apply</h2>
      <div>
        <input
          type="file"
          id="resume"
          name="resume"
          accept=".pdf,.doc,.docx"
          required
        />
      </div>

      <div>
        <textarea
          id="cover-letter"
          name="cover-letter"
          rows="4"
          placeholder="Cover Letter"
          required
        ></textarea>
      </div>

      <div>
        <input
          type="url"
          id="linkedin-profile"
          name="linkedin-profile"
          placeholder="LinkedIn Profile (optional)"
        />
      </div>

      <div>
        <input
          type="url"
          id="portfolio"
          name="portfolio"
          placeholder="Personal Website (if applicable)"
        />
      </div>

      <div>
        <input
          type="text"
          id="skills"
          name="skills"
          placeholder="Relevant Skills"
          required
        />
      </div>

      <div>
        <input
          type="text"
          id="languages"
          name="languages"
          placeholder="Languages Spoken (if applicable)"
        />
      </div>
      <button class="secondary-btn" type="submit">Submit Application</button>
    </form>
  </body>
</html>
