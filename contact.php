<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/f559c39257.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="stylesheet" href="styles/getintouch.css" />
    <title>JobLink | Contact</title>
  </head>
  <body style="overflow: hidden">
    <?php
    include('./header.php');
    ?>
    <h2 style="text-align: center">GET IN TOUCH</h2>
    <main
      style="
        border: solid rgb(177, 175, 175) 1px;
        width: 80%;
        height: 100%;
        margin-left: auto;
        margin-right: auto;
        border-radius: 10px;
      "
    >
      <div class="contact-info">
        <p style="text-align: center; margin-top: -110px">
          We’d love to hear from you, Our team is always here to chat.
        </p>
        <div class="contact-item">
          <i
            class="fa-regular fa-envelope"
            style="font-size: 30px; color: #e89a3c"
          ></i>
          <div>
            <span style="font-weight: bold">Chat with us</span><br />
            Our team is here to help you!<br />
            <span style="font-weight: bold; color: #2b2ecf"
              >rolineservices3@gmail.com</span
            >
          </div>
        </div>
        <div class="contact-item">
          <i
            class="fa-solid fa-phone"
            style="font-size: 30px; color: #e89a3c"
          ></i>
          <div>
            <span style="font-weight: bold">Phone</span><br />
            Mon - Sat, 9AM - 7PM<br />
            <span style="font-weight: bold; color: #2b2ecf">+250798221541</span>
          </div>
        </div>
        <div
          class="contact-item"
          style="flex-direction: column; margin-bottom: 20px"
        >
          <b>Social Medias</b>
          <div>
            <a href="https://www.instagram.com/fab_mukunzi/"
              ><i
                class="fa-brands fa-instagram"
                style="font-size: 25px; color: #e89a3c"
              ></i
            ></a>
            <a href="https://github.com/fabmukunzi"
              ><i
                class="fa-brands fa-github"
                style="font-size: 25px; color: #e89a3c"
              ></i
            ></a>
            <a href="https://www.linkedin.com/in/mukunzi-fabrice/">
              <i
                class="fa-brands fa-linkedin"
                style="font-size: 25px; color: #e89a3c"
              ></i>
            </a>
          </div>
        </div>
      </div>
      <div class="contact-msg">
        <p style="text-align: center">
          Do you have any enquiries? Fill the form below to reach out directly,
          Our team wil get back to you ASAP!
        </p>
        <form
          style="
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: left;
          "
        >
          <input
            style="width: 80%"
            type="text"
            name="names"
            placeholder="Enter your names"
            required
          />
          <input
            style="width: 80%; margin: 20px 20px 20px 20px"
            type="email"
            name="email"
            placeholder="Enter your email"
            required
          />
          <textarea
            style="width: 80%"
            name="message"
            rows="6"
            placeholder="Leave a message ..."
            required
          ></textarea>
          <button
            class="secondary-btn"
            style="
              width: 85%;
              height: 43px;
              margin-top: 10px;
              margin-bottom: 30px;
            "
          >
            Send message
          </button>
        </form>
      </div>
    </main>
  </body>
</html>
