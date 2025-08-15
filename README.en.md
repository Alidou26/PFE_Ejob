<div align="left"> <a href="./README.md">🇫🇷 Français</a> | <a href="./README.en.md">🇬🇧 English</a> </div>

---

<a name="top"></a>

<div align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
  <img src="https://img.shields.io/badge/FaceIO-000000?style=for-the-badge&logo=face-recognition&logoColor=white" alt="FaceIO">
  <img src="https://img.shields.io/badge/WebRTC-333333?style=for-the-badge&logo=webrtc&logoColor=white" alt="WebRTC">
  <h1>Job Search Platform — E-job (Final Year Project)</h1> 
  <p>Project developed during our internship at the Higher School of Technology (EST) in Dakhla.
    — Web platform connecting job seekers and employers with facial recognition and real-time video interviews.</p>
</div>

# [Demo Video](https://drive.google.com/file/d/1j_fFIZO1UCVzL9FBF4Yu5ooe13vhHvZ8/view?usp=sharing)
If the link doesn't work, please copy and paste it into your browser.

# [Report](https://drive.google.com/file/d/1ZC3K8jgseLpnp2MA49-s_n1Q64SxVzrX/view?usp=sharing)
If the link doesn't work, please copy and paste it into your browser.

## Table of Contents
1. [Introduction](#introduction)
2. [Key Features](#features)
3. [Technologies Used](#tech)
4. [Installation](#installation)
5. [Future Improvements](#future)
6. [Demo](#demo)

---

## Introduction<a name="introduction"></a>

E-job is a job search platform connecting **companies** with job openings and **job seekers**.  
The goal is to **simplify job hunting for candidates** while **digitizing the recruitment process for employers**.  

The platform includes:
- **Traditional authentication** and **facial recognition** (FaceIO API).
- **E-jobBook** for posting, liking, and commenting on job offers without company status.
- A **dashboard** for each profile type (candidate/recruiter).
- **Real-time video interview module** using WebRTC.

<div align="right">
  <a href="#top">⬆ Back to top</a>
</div>

---

## Key Features<a name="features"></a>

### 👤 Candidate
- Authentication via **login/password** or **facial recognition**.
- Search and browse jobs by **keyword**, **industry**, **category**.
- Apply online and manage applications.
- Add education, experience, skills, and preferred fields.
- Automatic email alerts for matching job offers.
- Automatic CV generation/download from predefined templates.
- Dashboard with statistics and reminders.
- Interaction on **E-jobBook** (posts, likes, comments).

### 🏢 Recruiter
- Traditional or facial recognition authentication.
- Post and manage job offers.
- Search candidates by skills or school.
- Application management (CV downloads, built-in messaging).
- Real-time video interviews via **WebRTC**.
- Dashboard with statistics and reminders.

### 🛠️ Administrator
- Access to global dashboard.
- Review and delete non-compliant offers/profiles/CVs.
- Platform-wide statistics management.

### 📱 E-jobBook
- Free posts by candidates.
- Like and comment on posts.

<div align="right">
  <a href="#top">⬆ Back to top</a>
</div>

---

## Technologies Used<a name="tech"></a>

<div align="center">
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" width="60" height="60" alt="PHP">
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" width="60" height="60" alt="MySQL">
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/bootstrap/bootstrap-plain-wordmark.svg" width="60" height="60" alt="Bootstrap">
  <img src="https://www.vectorlogo.zone/logos/javascript/javascript-icon.svg" width="60" height="60" alt="JavaScript">
  <img src="https://www.vectorlogo.zone/logos/webrtc/webrtc-icon.svg" width="60" height="60" alt="WebRTC">
  <img src="https://www.vectorlogo.zone/logos/jquery/jquery-icon.svg" width="60" height="60" alt="jQuery">
</div>

- **Backend**: PHP  
- **Frontend**: HTML5, CSS3, Bootstrap, JavaScript, jQuery, Ajax  
- **Database**: MySQL  
- **API**: FaceIO (facial recognition)  
- **Video Conferencing**: WebRTC  
- **Email Management**: PHPMailer + Mailtrap  

<div align="right">
  <a href="#top">⬆ Back to top</a>
</div>

---

## Installation<a name="installation"></a>

### Prerequisites
- XAMPP (Apache, MySQL, PHP ≥ 7)
- Modern browser (Chrome, Firefox, Edge)

### Installation Steps
1. **Clone the repository**
   ```bash
   git clone https://github.com/Alidou26/PFE_Ejob.git
   cd PFE_Ejob
   ```
### Configure Database
- Import `ejob.sql` into **phpMyAdmin**  
- Update credentials in `BaseDeDonnees.php`  

### Launch Server
- Start **Apache** and **MySQL** via **XAMPP**  
- Access [http://localhost/ejob](http://localhost/ejob)  

<div align="right"> <a href="#top">⬆ Back to top</a> </div>

---

## Future Improvements<a name="future"></a>
- 📱 Mobile app development (React Native/Flutter)  
- 🔐 Add two-factor authentication (2FA) and enhanced security  
- ☁️ Cloud deployment (AWS/Azure) with CI/CD  
- 🤖 AI-powered smart matching for job/candidate suggestions  
- 📈 Advanced analytics tools for recruiters (trends, reports)  
- 🗂️ Advanced CV document management  

<div align="right"> <a href="#top">⬆ Back to top</a> </div>

---

## Demo<a name="demo"></a>

<img src="image/1.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/2.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/3.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/4.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/5.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/6.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/7.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/8.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/9.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/10.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/11.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/12.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/13.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/14.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/15.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/16.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/17.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/18.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/19.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/20.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/21.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">

<div align="right"> <a href="#top">⬆ Back to top</a> </div>
