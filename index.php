<?php
    session_start();
    if(isset($_SESSION["username"])){  
    }else{
        echo header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300;400;900&family=Silkscreen:wght@400;700&family=VT323&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <style>
        body{
            margin: 0;
            background-color: rgb(2, 6, 23);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;    
            font-family: "VT323", serif;
            font-weight: 400;
            font-style: normal;
        }

        header {
            position: fixed;
            width: 100%;
            background-color: rgb(15, 21, 36);
            color: #fff;
            padding: 0px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgb(51, 65, 85);
            z-index: 1000;
        }

        header nav a {
            color: #fff;
            margin: 0 15px;
            cursor: pointer;
        }

        header nav a:hover {
            color: #f3a953;
        }

        /* Dropdown Menu */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        #profile-icon {
            width: 35px;
        }

        .logo {
            font-family: "Silkscreen", serif;
            font-weight: 700;
            font-style: normal;
            font-size: 12px;
        }

        .arrow {
            font-size: 10px;
        }

        .nav-links {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            position: relative;
            font-size: 20px;
        }

        .nav-links a {
            font-family: "VT323", serif;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            color: white;
            padding: 15px 20px;
            display: block;
        }

        .nav-links a:hover {
            background-color: #575757;
        }

        .dropdown {
            position: relative; /* Tambahkan ini untuk konteks z-index */
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 50px;
            left: 0;
            background-color: #1e1e1e;
            list-style: none;
            padding: 0;
            margin: 0;
            width: 150px;
            z-index: 9999; /* Tambahkan ini untuk memastikan dropdown berada di depan */
        }

        .dropdown-menu li {
            border-bottom: 1px solid #575757;
        }

        .dropdown-menu li a {
            padding: 10px 15px;
        }

        .dropdown-menu li a:hover {
            background-color: #575757;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
        
        .banner {
            position: sticky;
            display: flex;
            justify-content: center;
            text-align: center;
            margin-top: 40px;
        }

        .video {
            position: absolute;
            left: 0;
            width: 100%;
            height: 470px;
            object-fit: cover; /* Agar video tidak terdistorsi */
            z-index: -1; /* Video berada di belakang konten lain */
        }

        .main-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 470px;
            background: linear-gradient(270deg, rgba(2, 6, 23, 0) 1.08%, rgba(2, 6, 23, 0.6) 70.19%);
        }

        .main-content h2 {
            font-family: "VT323", serif;
            font-weight: 700;
            font-style: normal;
            font-size: 80px; 
            color: rgb(255, 255, 255);
            letter-spacing: 15px;
            text-shadow: rgba(2, 6, 23, 0.8) 4px 5px 0px;
            margin: 0;
        }

        .main-content a input[type="submit"] {
            background-color: transparent; 
            color: rgb(255, 255, 255);
            border: none;
            font-family: "VT323", serif;
            font-weight: 100;
            font-style: normal;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 30px;
            letter-spacing: 2px;
            text-shadow: rgba(2, 6, 23, 0.8) 2px 3px 0px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .gambar-item li a{
            background-color: rgb(15, 21, 36);
            border: 2px solid rgb(51, 65, 85);
            border-radius: 10px;
        }

        .main-content a input[type="submit"]:hover {
            transform: scale(1.1);
        }

        .study-options {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            gap: 40px;
            margin-top: -60px;
        }

        .study-options img {
            width: 350px;
            height: 210px;
            object-fit: cover;
            border-radius: 5px; 
        }

        .halamanfriend {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        
        }

        .containerspin {
            margin: 40ox;
            text-align: center;
            background: rgba(60, 60, 60, 0.85);
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.4);
            width: 400px;
            animation: fadeIn 1.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .containerspin h1 {
            font-size: 2.5rem;
            color: #ff8c00;
            margin-bottom: 10px;
        }

        .status {
            font-size: 1.2rem;
            color: #666;
            margin-top: 20px;
            display: none;
        }

        .containerspin button {
            padding: 15px 30px;
            border: none;
            background-color: #ff8c00;
            color: white;
            font-size: 1.1rem;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .containerspin button:hover {
            background-color: #ff6a00;
            transform: scale(1.1);
        }

        .result {
            font-size: 1.3rem;
            color: #333;
            margin-top: 20px;
            display: none;
        }

        .spinner {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #ff8c00;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1.2s linear infinite, glow 1.2s ease-in-out infinite;
            margin: 20px auto;
            display: none;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 10px #ff8c00;
            }
            50% {
                box-shadow: 0 0 30px #ff6a00;
            }
        }

        .bodyai {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1c1b29, #262f63);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .containerai {
            width: 90%;
            max-width: 700px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .halamanai {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            transition: transform 0.3s, box-shadow 0.3s;
            color: #fff;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.6);
        }
        
        .containerai h2 {
            margin: 0;
            margin-bottom: 15px;
            font-size: 1.8rem;
            text-shadow: 0px 5px 15px rgba(0, 0, 0, 0.4);
            color: #f37335;
        }
        .containerai button {
            padding: 15px 30px;
            margin: 10px 0;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            background: linear-gradient(90deg, #f37335, #fdc830);
            color: #fff;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.4);
        }
        .containerai button:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
        }
        .containerai output {
            margin-top: 15px;
            padding: 15px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            box-shadow: inset 0px 5px 15px rgba(0, 0, 0, 0.5);
            font-size: 1rem;
        }
        .containerai textarea {
            width: 96%;
            border: none;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            font-size: 1rem;
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.4);
            outline: none;
        }
        .containerai footer {
            margin-top: auto;
            text-align: center;
            padding: 20px;
            background: linear-gradient(90deg, #fdc830, #f37335);
            color: white;
            box-shadow: 0px -5px 15px rgba(0, 0, 0, 0.4);
        }
    
        .halamanquest {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top:70px;
        }

        .bodyreward {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow: hidden;
        }

        .containerreward {
            width: 90%;
            max-width: 700px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            text-align: center;
        }

        .containerreward h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #ffefdf;
        }

        .quest {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid rgba(255, 255, 255, 0.7);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.2);
            transition: transform 0.3s, background 0.3s;
        }

        .quest:hover {
            transform: scale(1.05);
            background: rgba(255, 255, 255, 0.3);
        }

        .quest.completed {
            text-decoration: line-through;
            opacity: 0.7;
        }

        .quest .points {
            background: #ffefdf;
            color: #ff6600;
            border-radius: 50px;
            padding: 5px 10px;
            font-weight: bold;
        }

        .containerreward button {
            background: linear-gradient(135deg, #feb47b, #ff7e5f);
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 18px;
            transition: all 0.3s;
        }

        .containerreward button:hover {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .timer {
            text-align: center;
            margin-top: 20px;
            color: #ffefdf;
            font-size: 1.2rem;
        }

        .reward-container {
            margin-top: 30px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 20px;
            border: 2px solid rgba(255, 255, 255, 0.5);
        }

        .reward-container h2 {
            margin-bottom: 15px;
        }

        .reward-list {
            display: flex;
            justify-content: space-around;
        }

        .reward-item {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff6600;
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
            }
            50% {
                box-shadow: 0 0 30px rgba(255, 255, 255, 1);
            }
        }

        .reward-item:hover {
            animation: glow 1s infinite;
        }

        .bodysearch {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1A1A1A;
            color: white;
        }
        .containersearch {
            max-width: 800px;
            margin-top: 400px;
            margin: 10px auto;
            padding: 20px;
            background-color: rgb(15, 21, 36);
            border: 2px solid rgb(51, 65, 85);
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
            color: #333;
        }

        .search-bar {
            display: flex;
            margin-bottom: 20px;
        }
        .search-bar input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            outline: none;
            margin-right: 10px;
            font-size: 14px;
        }
        .search-bar button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #EF6C00;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }
        .search-bar button:hover {
            background-color: #D84315;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
            color: #FFFFFF;
        }

        .header button {
            padding: 10px 20px;
            background-color: #EF6C00;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }
        .header button:hover {
            background-color: #D84315;
        }

        .search-bar {
            display: flex;
            margin-bottom: 20px;
        }

        .friend-list, .followed-list {
            list-style: none;
            padding: 0;
        }
        .friend-item, .followed-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            color: #333;
        }
        .friend-item img, .followed-item img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .friend-details {
            flex: 1;
        }
        .friend-details strong {
            font-size: 16px;
            color: #FF9800;
        }
        .friend-details span {
            display: block;
            font-size: 14px;
            color: #757575;
        }

        .friend-actions {
            margin-left: 400px;
        }

        .friend-actions button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #EF6C00;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }
        .friend-actions button:hover {
            background-color: #D84315;
        }

        /* News Section */
        .news-section {
            padding: 50px 20px;
            background: #f9f9f9;
        }

        .news-section h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            color: #333;
        }

        .news-cards {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            flex-wrap: wrap;
        }

        .news-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            transition: transform 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-10px);
        }

        .news-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .news-card .content {
            padding: 15px;
        }

        .news-card .content h3 {
            font-size: 1.2rem;
            margin: 0 0 10px;
            color: #333;
        }

        .news-card .content p {
            font-size: 0.9rem;
            color: #666;
            margin: 0 0 15px;
        }

        .news-card .content .date {
            font-size: 0.8rem;
            color: #aaa;
        }

        .news-card .content .tag {
            font-size: 0.8rem;
            color: #f3a953;
            font-weight: 600;
            text-transform: uppercase;
        }

        /* Card Section */
        .card-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .contentabout {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background: rgb(15, 21, 36);
            border: 2px solid rgb(51, 65, 85);
            border-radius: 10px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }
        .contentabout h2 {
            color: #FF6D00;
            text-align: center;
        }
        .contentabout p {
            color: white;
            font-size: 16px;
            line-height: 1.6;
            text-align: justify;
        }
        .contentabout ul {
            color: white;
            margin-top: 20px;
            padding-left: 20px;
        }
        .contentabout ul li {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .bodycreator {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(120deg, #FF6F00, #FFD54F);
            color: #ffffff;
            overflow: hidden;
        }
        
        .halamancreator {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .containercreator {
            display: flex;
            width: 90%;
            height: 80%;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
            border-radius: 30px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebarcreator {
            width: 30%;
            background: rgba(0, 0, 0, 0.6);
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .sidebarcreator h2 {
            font-size: 2.2rem;
            margin-bottom: 30px;
            color: #ff6f00;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        .sidebarcreator img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            cursor: pointer;
            transition: transform 0.4s, box-shadow 0.4s;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            border: 4px solid #ff6f00;
        }

        .sidebarcreator img:hover {
            transform: scale(1.2);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
        }

        .profile-displaycreator {
            flex-grow: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
        }

        .profile-displaycreator img {
            width: 220px;
            height: 220px;
            border-radius: 50%;
            border: 6px solid #ff6f00;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            transition: transform 0.4s, box-shadow 0.4s;
        }

        .profile-displaycreator img:hover {
            transform: scale(1.1);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.7);
        }

        .profile-displaycreator h2 {
            font-size: 3.5rem;
            margin-bottom: 15px;
            color: #ff6f00;
            text-shadow: 0 5px 20px rgba(0, 0, 0, 0.6);
        }

        .profile-displaycreator p {
            font-size: 1.5rem;
            color: #fff;
            margin-bottom: 20px;
            max-width: 600px;
            line-height: 1.8;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
        }

        .profile-displaycreator .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .profile-displaycreator .social-links a {
            color: #ff6f00;
            font-size: 2.5rem;
            text-decoration: none;
            transition: color 0.3s, transform 0.3s;
        }

        .profile-displaycreator .social-links a:hover {
            color: #FF6F00;
            transform: scale(1.3);
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
            }

            .sidebar {
                width: 100%;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
            }

            .profile-display {
                padding: 30px;
            }

            .profile-display h2 {
                font-size: 2.5rem;
            }

            .profile-display p {
                font-size: 1.2rem;
            }
        }

        .hidden {
            display: none;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
            padding: 40px;
            margin-top: 60px;
        }

        .bodylead {
            margin: 0;
            font-family: 'Raleway', sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #fff;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            perspective: 1500px;
        }

        .leaderboard-container {
            position: relative;
            width: 700px;
            transform: rotateX(20deg);
            animation: float 5s infinite ease-in-out;
        }

        .leaderboard {
            background: linear-gradient(145deg, rgba(0, 0, 0, 0.8), rgba(30, 30, 30, 0.9));
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
            padding: 40px;
            position: relative;
            overflow: hidden;
            z-index: 1;
            transform-style: preserve-3d;
            animation: float 2s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(-10px) rotateX(20deg);
            }
            50% {
                transform: translateY(10px) rotateX(20deg);
            }
        }

        .leaderboard::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1.5);
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent);
            filter: blur(100px);
            z-index: -1;
        }

        .leaderboard h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 3em;
            text-transform: uppercase;
            margin-bottom: 20px;
            text-align: center;
            color: #ff6f61;
            text-shadow: 0 0 20px rgba(255, 111, 97, 0.7), 0 0 40px rgba(255, 111, 97, 0.5);
        }

        .leaderboard ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .leaderboard li {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0.6));
            margin: 15px 0;
            padding: 20px 25px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            position: relative;
            overflow: hidden;
            transition: transform 0.5s, box-shadow 0.5s;
            transform-style: preserve-3d;
        }

        .leaderboard li:hover {
            transform: scale(1.1) rotateY(10deg);
            box-shadow: 0 15px 30px rgba(255, 111, 97, 0.5);
        }

        .leaderboard li::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 111, 97, 0.2), rgba(0, 0, 0, 0));
            opacity: 0;
            z-index: 0;
            transition: opacity 0.5s;
        }

        .leaderboard li:hover::after {
            opacity: 1;
        }

        .leaderboard .rank {
            font-size: 2em;
            font-weight: bold;
            color: #ff6f61;
            text-shadow: 0 0 10px rgba(255, 111, 97, 0.8);
            z-index: 1;
        }

        .leaderboard .name {
            flex: 1;
            text-align: left;
            font-size: 1.5em;
            color: #fff;
            z-index: 1;
        }

        .leaderboard .score {
            font-size: 1.5em;
            font-weight: bold;
            color: #ffa36c;
            text-shadow: 0 0 10px rgba(255, 163, 108, 0.8);
            z-index: 1;
        }

        .glow-bg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1.8);
            width: 1200px;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 111, 97, 0.2), rgba(255, 255, 255, 0));
            filter: blur(200px);
            z-index: -2;
        }

    </style>
</head>

<body>

    <header>
          
          <img id="profile-icon" src="https://via.placeholder.com/50" alt="Profil" title="Pengaturan Profil">
  
          <div class="logo">
              <h1> Study Buddy </h1>
          </div>
          
          <nav class="navbar">
              <ul class="nav-links">
                  <li><a href="#" id="home" onclick="showSection('home-section'); showContent1()">Home</a></li>
                  <li><a href="#" id="news" onclick="showSection('news-section'); hideContent1()">News</a></li>
                  <li class="dropdown">
                      <a href="#" id="informasi" class="dropdown-toggle">
                          Inform <span class="arrow">&#x25BC;</span>
                      </a>
                      <ul class="dropdown-menu">
                          <li><a href="#" id="about-web" onclick="showSection('about-web-section'); hideContent1()">About Website</a></li>
                          <li><a href="#" id="sb" onclick="showSection('sb-section'); hideContent1()">Creator's Profile</a></li>
                          <li><a href="#" id="journal" onclick="coming()('journal-section')">Journal</a></li>
                          <li><a href="#" id="games" onclick="coming()('games-section')">Games</a></li>
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a href="#" id="informasi" class="dropdown-toggle">
                          Friends <span class="arrow">&#x25BC;</span>
                      </a>
                      <ul class="dropdown-menu">
                          <li><a href="#" id="search" onclick="showSection('search-section'); hideContent1()">Search Friends</a></li>
                          <li><a href="#" id="list" onclick="showSection('list-section'); hideContent1()">Friend List</a></li>
                      </ul>
                  </li>
                  <li><a href="#" id="lead" onclick="showSection('lead-section'); hideContent1()">Leaderboard</a></li>
              </ul>
          </nav>    
    </header>

    <main>

    <div id="dynamic-bannercont" class="banner">
        <video id="dynamic-banner" class="video" autoplay muted loop>
            <source id="dynamic-video" src="src/indexbg.mp4" type="video/mp4">
        </video>
        <div class="main-content">
            <h2 id="dynamic-bannertext">LET'S STUDY</h2>
            <br>
            <a href="#"><input type="submit" onclick="regist()" id="dynamic-bannerbtn" value="<  Pre-Regist  >"></a>
        </div>
    </div>

    <!-- Halaman Berita -->
    <div id="news-section" class="section">
        <h2>News Report</h2>
        <div class="news-cards">
            <div class="news-card">
                <img src="src/b1.jpg" alt="News 1">
                <div class="content">
                    <h3>Para Guru di Berbagai Daerah Gunakan AI untuk Asah Nalar Kritis Siswa"</h3>
                    <p>Berita ini mengangkat bagaimana para guru di berbagai daerah di Indonesia memanfaatkan teknologi AI untuk melatih kemampuan berpikir dan bernalar kritis pada siswa.</p>
                    <div class="date">22/12/2024</div>
                    <div class="tag">Buletin</div>
                </div>
            </div>
            <div class="news-card">
                <img src="src/b2.jpg" alt="News 2">
                <div class="content">
                    <h3>Event Kuis Interaktif Berbasis AI</h3>
                    <p>Event ini memberikan pengalaman seru dan edukatif dengan memadukan kompetisi dan teknologi AI dalam pembelajaran.</p>
                    <div class="date">25/01/2025</div>
                    <div class="tag">Event</div>
                </div>
            </div>
            <div class="news-card">
                <img src="src/b3.jpeg" alt="News 3">
                <div class="content">
                    <h3>Peluncuran Aplikasi Study Buddy</h3>
                    <p>Study Buddy, aplikasi pembelajaran berbasis AI, akan segera diluncurkan untuk membantu pelajar belajar lebih efektif dan interaktif dengan menggunakan teknologi canggih.</p>
                    <div class="date">To Be Announcement</div>
                    <div class="tag">Buletin</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Halaman Informasi -->
    <div id="about-web-section" class="section" class="bodyabout">
    
        <div class="contentabout">
            <h2>About Study Buddy</h2>
            <p>
                Study Buddy is a revolutionary platform designed to enhance your learning experience. Whether you are a student striving to excel in academics or a professional looking to acquire new skills, Study Buddy is your go-to partner for all your educational needs.
            </p>
            <p>
                Our platform offers a wide range of features tailored to support your learning journey, including:
            </p>
            <ul>
                <li><b>Collaborative Learning:</b> Connect with peers and experts to study together in virtual rooms.</li>
                <li><b>Progress Tracking:</b> Monitor your achievements and set goals to stay motivated.</li>
                <li><b>Interactive Tools:</b> Utilize flashcards, quizzes, and personalized study plans to maximize productivity.</li>
                <li><b>Daily Reminders:</b> Stay on track with scheduled reminders for your tasks and study sessions.</li>
            </ul>
            <p>
                At Study Buddy, we believe in making learning accessible, enjoyable, and effective for everyone. Join our community and take the next step toward achieving your educational dreams!
            </p>
        </div>
    </div>
    <div id="sb-section" class="section">
        <div class="halamancreator">
            <div class="containercreator">
                <div class="sidebarcreator">
                    <h2>Creators</h2>
                    <img src="src/alya.jpg" alt="Creator 1" onclick="showProfile(0)">
                    <img src="src/annisa.jpg" alt="Creator 2" onclick="showProfile(1)">
                    <img src="src/dayat.jpg" alt="Creator 3" onclick="showProfile(2)">
                    <img src="src/ade.jpg" alt="Creator 4" onclick="showProfile(3)">
                    <img src="src/fauzil.jpg" alt="Creator 5" onclick="showProfile(4)">
                    <img src="src/zaidan.jpg" alt="Creator 6" onclick="showProfile(5)">
                </div>
                <div class="profile-displaycreator" id="profileDisplay">
                    <img src="src/0.png" alt="Profile Picture" id="profilePic">
                    <h2 id="profileName">Creator</h2>
                    <p id="profileBio">Bio</p>
                    <div class="social-links" id="socialLinks">
                        <a href="#" target="_blank" id="twitterLink">🐦</a>
                        <a href="#" target="_blank" id="linkedinLink">🔗</a>
                        <a href="#" target="_blank" id="githubLink">🐙</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="journal" class="section">
        <h1>Journal</h1>
        <p>Catatan jurnal terkait Study Buddy.</p>
    </div>
    <div id="games" class="section">
        <h1>Games</h1>
        <p>Hiburan yang ada di website ini.</p>
    </div>

    <!-- Halaman Teman -->
    <div id="search-section" class="section" class="bodysearch">
        <div class="containersearch">
            <div class="header">
                <h1>Friend Search</h1>
                <button onclick="refreshRecommendations()">Refresh</button>
            </div>
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search by name or ID">
                <button onclick="searchFriend()">Search</button>
            </div>
            <ul class="friend-list" id="friendList">
                <li class="friend-item">
                    <img src="src/pp7.png" alt="Avatar">
                    <div class="friend-details">
                        <strong>Rama</strong>
                        <span>Game - Musik</span>
                        <span style="color: green;">Online</span>
                    </div>
                    <div class="friend-actions">
                        <button onclick="followFriend(this, 'Rama', 'Game - Musik', 'Online')">Follow</button>
                    </div>
                </li>
                <li class="friend-item">
                    <img src="src/pp2.png" alt="Avatar">
                    <div class="friend-details">
                        <strong>Fauzil</strong>
                        <span>Game - Islami</span>
                        <span style="color: green;">Online</span>
                    </div>
                    <div class="friend-actions">
                        <button onclick="followFriend(this, 'Fauzil', 'Game - Islami', 'Online')">Follow</button>
                    </div>
                </li>
                <li class="friend-item">
                    <img src="src/pp1.png" alt="Avatar">
                    <div class="friend-details">
                        <strong>Alya</strong>
                        <span>Film - Pecinta Kucing</span>
                        <span style="color: green;">Online</span>
                    </div>
                    <div class="friend-actions">
                        <button onclick="followFriend(this, 'Alya', 'Film - Pecinta Kucing', 'Online')">Follow</button>
                    </div>
                </li>
                <li class="friend-item">
                    <img src="src/pp3.png" alt="Avatar">
                    <div class="friend-details">
                        <strong>Hidayatullah</strong>
                        <span>Anime - Islami</span>
                        <span style="color: green;">Online</span>
                    </div>
                    <div class="friend-actions">
                        <button onclick="followFriend(this, 'Hidayatullah', 'Anime - Islami', 'Online')">Follow</button>
                    </div>
                </li>
                <li class="friend-item">
                    <img src="src/pp8.png" alt="Avatar">
                    <div class="friend-details">
                        <strong>Astro</strong>
                        <span>Adventure - Math</span>
                        <span style="color: green;">Online</span>
                    </div>
                    <div class="friend-actions">
                        <button onclick="followFriend(this, 'Astro', 'Adventure - Math', 'Online')">Follow</button>
                    </div>
                </li>
                <li class="friend-item">
                    <img src="src/pp5.png" alt="Avatar">
                    <div class="friend-details">
                        <strong>Lunar</strong>
                        <span>Killer</span>
                        <span style="color: green;">Online</span>
                    </div>
                    <div class="friend-actions">
                        <button onclick="followFriend(this, 'Lunar', 'Killer', 'Online')">Follow</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div id="list-section" class="section" class="bodylist" class="header" class="containersearch">
        <h2 style="color: white; padding-top: 25px; margin-left: 2px;">Friend List</h2>
    <ul class="followed-list" id="followedList">
        <!-- Followed friends will appear here -->
    </ul>
    </div>

    <!-- Leaderboard -->
    <div id="lead-section" class="section" class="bodylead">
        <div class="leaderboard-container">
            <div class="leaderboard">
                <h1>Elite Rankings</h1>
                <ul id="leaderboard-list">
                    <!-- Leaderboard items will be injected here -->
                </ul>
            </div>
            <div class="glow-bg"></div>
        </div>
    </div>

    <div id="home-section" class="section active">
        <div class="study">
            <div class="study-content">
                <ul class="nav-links">
                <div class="study-options">
                    <div class="gambar-item">
                        <li><a href="#" id="friend" onclick="showSection('friend-section'); hideContent1()"><img src="https://tenor.com/en-GB/view/anime-gif-18108603.gif" alt="f1"><p>Study With Public</p></a></li>
                    </div>
                    <div class="gambar-item">
                        <li><a href="#" id="ai" onclick="showSection('ai-section'); hideContent1()"><img src="https://tenor.com/en-GB/view/itzah-pixel-art-pokemon-black-hilda-tepig-gif-629645915867347804.gif" alt="f2"><p>Study With AI</p></a></li>
                    </div>
                    <div class="gambar-item">
                        <li><a href="#" id="quest" onclick="showSection('quest-section'); hideContent1()"><img src="https://tenor.com/en-GB/view/mario-pixel-art-gaming-room-gif-23722022.gif" alt="f3"><p>Daily Quest</p></a></li>
                    </div>
                    <div class="gambar-item">
                        <li><a href="#" id="join-room" onclick="joinRoom()"><img src="https://tenor.com/en-GB/view/cat-space-nyan-cat-gif-22656380.gif" alt="f4"><p>COMING SOON</p></a></li>                          
                    </div>
                    <div class="gambar-item">
                        <li><a href="#" id="join-room" onclick="joinRoom()"><img src="https://tenor.com/en-GB/view/cat-space-nyan-cat-gif-22656380.gif" alt="f5"><p>COMING SOON</p></a></li>
                    </div>
                    <div class="gambar-item">
                        <li><a href="#" id="join-room" onclick="joinRoom()"><img src="https://tenor.com/en-GB/view/cat-space-nyan-cat-gif-22656380.gif" alt="f6"><p>COMING SOON</p></a></li>
                    </div>
                </div>
                </ul>
            </div>
        </div>
    </div>

    <!-- Halaman Fitur With Friends -->
    <div id="friend-section" class="section" class="bodySpin">
        <div class="halamanfriend">
            <div class="containerspin">
                <h1>Find Your Friends</h1>
                <p class="status">Searching for active Users...</p>
                <div class="spinner"></div>
                <div class="result"></div>
                <button id="searchBtn">Search</button>
            </div>
        </div>
    </div>

    <!-- Halaman Fitur With AI -->
    <div id="ai-section" class="section" class="bodyai">
        <div class="halamanai">
            <div class="containerai">
                <!-- Voice Interaction -->
                <div class="card">
                    <h2>AI Voice Interaction</h2>
                    <button onclick="startVoiceInteraction()">Talk to AI</button>
                    <div id="voiceOutput" class="output">Your AI voice responses will appear here...</div>
                </div>
        
                <!-- AI Quiz -->
                <div class="card">
                    <h2>Interactive Quiz</h2>
                    <button onclick="startQuiz()">Start Quiz</button>
                    <div id="quizOutput" class="output">Quiz results will appear here...</div>
                </div>
        
                <!-- ChatGPT-like Interaction -->
                <div class="card">
                    <h2>Chat with AI</h2>
                    <textarea id="questionInput" placeholder="Type your question here..."></textarea>
                    <button onclick="askAI()">Ask AI</button>
                    <div id="aiOutput" class="output">AI's response will appear here...</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Halaman Fitur quest -->
    <div id="quest-section" class="section" class="bodyreward">
        <div class="halamanquest">
            <div class="containerreward">
                <h1>Daily Quests</h1>
                <div id="quests">
                    <!-- Quests will be dynamically added here -->
                </div>
                <button id="completeButton">Complete All</button>
                <div class="timer" id="timer"></div>
        
                <div class="reward-container">
                    <h2>Rewards</h2>
                    <div class="reward-list">
                        <div class="reward-item">💎</div>
                        <div class="reward-item">✨</div>
                        <div class="reward-item">🏆</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </main>

    <audio id="backgroundMusic" src="src/music.mp3" autoplay loop></audio>

    <script>

    function hideContent1() {
        const content = document.getElementById("dynamic-bannercont");
        if (!content.classList.contains("hidden")) {
            content.classList.add("hidden");
        }
        }
    
    function showContent1() {
        const content = document.getElementById("dynamic-bannercont");
        content.classList.remove("hidden");
        }

    function showSection(sectionId) {
    // Sembunyikan semua section
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.classList.remove('active');
    });

    // Tampilkan section yang dipilih
    const targetSection = document.getElementById(sectionId);
    if (targetSection) {
        targetSection.classList.add('active');
    }
}

        let cropper;

        // Elemen DOM
        const profileIcon = document.getElementById("profile-icon");
        const profileSidebar = document.getElementById("profile-sidebar");
        const closeProfile = document.getElementById("close-profile");
        const profileForm = document.getElementById("profile-form");
        const profilePictureInput = document.getElementById("profile-picture");
        const bgColorInput = document.getElementById("bg-color");
        const cropModal = document.getElementById("crop-modal");
        const imageToCrop = document.getElementById("image-to-crop");
        const cropBtn = document.getElementById("crop-btn");
        const closeModalBtn = document.querySelector(".close-btn");

        // Sidebar Toggle
        profileIcon.addEventListener("click", () => {
            if (profileSidebar.classList.contains("active")) {
                profileSidebar.classList.remove("active");
                profileIcon.classList.remove("active");
            } else {
                profileSidebar.classList.add("active");
                profileIcon.classList.add("active");
            }
        });

        // Tutup Sidebar dengan Tombol Close
        closeProfile.addEventListener("click", () => {
            profileSidebar.classList.remove("active");
            profileIcon.classList.remove("active");
        });

        // Simpan Pengaturan Profil ke localStorage
        profileForm.addEventListener("submit", function (event) {
            event.preventDefault();

            const username = document.getElementById("username").value;
            const email = document.getElementById("email").value;
            const bio = document.getElementById("bio").value;
            const bgColor = bgColorInput.value;

            // Simpan ke localStorage
            localStorage.setItem("username", username);
            localStorage.setItem("email", email); // Menyimpan email
            localStorage.setItem("bio", bio);
            localStorage.setItem("bgColor", bgColor);

            // Simpan warna latar belakang
            document.body.style.backgroundColor = bgColor;

            alert(`Profil Anda diperbarui:\nNama: ${username}\nEmail: ${email}\nBio: ${bio}`);
        });

        // Upload dan Crop Gambar
        profilePictureInput.addEventListener("change", (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imageToCrop.src = e.target.result;
                    cropModal.style.display = "flex";

                    // Tunggu hingga gambar dimuat sebelum inisialisasi Cropper
                    imageToCrop.onload = () => {
                        if (cropper) {
                            cropper.destroy(); // Hapus cropper sebelumnya jika ada
                        }
                        cropper = new Cropper(imageToCrop, {
                            aspectRatio: 1,
                            viewMode: 1,
                        });
                    };
                };
                reader.readAsDataURL(file);
            }
        });

        // Simpan hasil crop
        cropBtn.addEventListener("click", () => {
            const canvas = cropper.getCroppedCanvas({
                width: 300, // Resolusi output yang diinginkan
                height: 300,
            });

            // Perbarui gambar profil
            profileIcon.src = canvas.toDataURL("image/png");

            // Simpan gambar hasil crop ke localStorage
            localStorage.setItem("profileImage", canvas.toDataURL("image/png"));

            // Tutup modal
            cropModal.style.display = "none";
            cropper.destroy();
            cropper = null;
        });

        // Tutup modal saat tombol tutup diklik
        closeModalBtn.addEventListener("click", () => {
            cropModal.style.display = "none";
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
        });

        // Pulihkan Data Profil dari localStorage saat Halaman Dimuat
        window.addEventListener("load", () => {
            const username = localStorage.getItem("username");
            const email = localStorage.getItem("email"); // Mengambil email dari localStorage
            const bio = localStorage.getItem("bio");
            const bgColor = localStorage.getItem("bgColor");
            const profileImage = localStorage.getItem("profileImage");

            // Pulihkan nama pengguna, email, bio, dan latar belakang
            if (username) document.getElementById("username").value = username;
            if (email) document.getElementById("email").value = email; // Pulihkan email
            if (bio) document.getElementById("bio").value = bio;
            if (bgColor) document.body.style.backgroundColor = bgColor;

            // Pulihkan gambar profil
            if (profileImage) profileIcon.src = profileImage;
        });

        const searchBtn = document.getElementById('searchBtn');
                const status = document.querySelector('.status');
                const spinner = document.querySelector('.spinner');
                const result = document.querySelector('.result');

                searchBtn.addEventListener('click', () => {
                    status.style.display = 'block';
                    spinner.style.display = 'block';
                    result.style.display = 'none';
                    searchBtn.disabled = true;
                    searchBtn.style.backgroundColor = '#cccccc';
                    
                    setTimeout(() => {
                        const users = ['Alya', 'Fauzil', 'Rama', 'Riski', 'Putra', 'Amat', 'Raihan', 'Jor', 'Astro', 'Lunar', 'Star', 'kei', 'Syeila'];
                        const matchedUser = users[Math.floor(Math.random() * users.length)];
                        
                        status.style.display = 'none';
                        spinner.style.display = 'none';
                        result.style.display = 'block';
                        result.textContent = `You are matched with: ${matchedUser}`;
                        searchBtn.disabled = false;
                        searchBtn.style.backgroundColor = '#ff8c00';
                    }, 3000); // Simulate 3 seconds of matchmaking
                });

                // Leaderboard data
                const players = [
                    { rank: 1, name: "Rama", score: 20000 },
                    { rank: 2, name: "Fauzil", score: 18120 },
                    { rank: 3, name: "Astro", score: 17720 },
                    { rank: 4, name: "Lunar", score: 17100 },
                    { rank: 5, name: "Alya", score: 17000 }
                ];

                // Populate leaderboard
                const leaderboardList = document.getElementById('leaderboard-list');
                players.forEach(player => {
                    const listItem = document.createElement('li');
                    listItem.innerHTML = `
                        <span class="rank">#${player.rank}</span>
                        <span class="name">${player.name}</span>
                        <span class="score">${player.score}</span>
                    `;
                    leaderboardList.appendChild(listItem);
                });

                // Voice Interaction
                function startVoiceInteraction() {
                    const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
                    recognition.lang = 'en-US';
                    recognition.start();

                    recognition.onresult = function(event) {
                        const userSpeech = event.results[0][0].transcript;
                        document.getElementById('voiceOutput').textContent = `You: ${userSpeech}`;

                        // Simulate AI Response
                        setTimeout(() => {
                            const aiResponse = `I heard you say: "${userSpeech}". Here is what I think about that!`;
                            document.getElementById('voiceOutput').textContent += `\nAI: ${aiResponse}`;
                        }, 2000);
                    };

                    recognition.onerror = function(event) {
                        document.getElementById('voiceOutput').textContent = `Error: ${event.error}`;
                    };
                }

                // Quiz
                function startQuiz() {
                    const question = "What is the capital of Japan?";
                    const answer = prompt(question);
                    const response = answer.toLowerCase() === "tokyo" ? "Correct! Well done." : "Incorrect! The correct answer is Tokyo.";
                    document.getElementById('quizOutput').textContent = response;
                }

                // ChatGPT-like Interaction
                async function askAI() {
                    const question = document.getElementById('questionInput').value;
                    if (!question.trim()) {
                        document.getElementById('aiOutput').textContent = "Please enter a valid question.";
                        return;
                    }

                    document.getElementById('aiOutput').textContent = "Processing your question...";

                    // Simulate AI response (could be replaced by real API integration)
                    const response = `Here is a detailed answer for your question: "${question}". Hope this helps!`;
                    setTimeout(() => {
                        document.getElementById('aiOutput').textContent = response;
                    }, 2000);
                }

                const quests = [
                    { id: 1, text: "Study with friend", points: 20, completed: false },
                    { id: 2, text: "Study with AI", points: 20, completed: false },
                    { id: 3, text: "Add 1 friend", points: 15, completed: false },
                    { id: 4, text: "Read about website", points: 5, completed: false },
                    { id: 5, text: "Share website", points: 50, completed: false },
                ];

                const questContainer = document.getElementById("quests");
                const completeButton = document.getElementById("completeButton");
                const timerElement = document.getElementById("timer");

                let timer = null;

                function renderQuests() {
                    questContainer.innerHTML = "";
                    quests.forEach((quest) => {
                        const questElement = document.createElement("div");
                        questElement.className = `quest ${quest.completed ? "completed" : ""}`;
                        questElement.innerHTML = `
                            <span>${quest.text} <span class="points">+${quest.points}</span></span>
                            ${quest.completed ? "✔️" : ""}
                        `;
                        questElement.addEventListener("click", () => toggleQuest(quest.id));
                        questContainer.appendChild(questElement);
                    });
                }

                function toggleQuest(id) {
                    const quest = quests.find((q) => q.id === id);
                    if (quest) quest.completed = !quest.completed;
                    renderQuests();
                }

                function completeAllQuests() {
                    if (quests.every((q) => q.completed)) {
                        questContainer.innerHTML = "";
                        startTimer();
                    } else {
                        alert("Please complete all quests first.");
                    }
                }

                function startTimer() {
                    const endTime = new Date();
                    endTime.setHours(24, 0, 0, 0);

                    timer = setInterval(() => {
                        const now = new Date();
                        const remaining = endTime - now;

                        if (remaining <= 0) {
                            clearInterval(timer);
                            timerElement.textContent = "";
                            resetQuests();
                            return;
                        }

                        const hours = String(Math.floor((remaining / (1000 * 60 * 60)) % 24)).padStart(2, "0");
                        const minutes = String(Math.floor((remaining / (1000 * 60)) % 60)).padStart(2, "0");
                        const seconds = String(Math.floor((remaining / 1000) % 60)).padStart(2, "0");

                        timerElement.textContent = `Next quests in: ${hours}:${minutes}:${seconds}`;
                    }, 1000);
                }

                function resetQuests() {
                    quests.forEach((q) => (q.completed = false));
                    renderQuests();
                }

                completeButton.addEventListener("click", completeAllQuests);

                renderQuests();

                // Fungsi Placeholder
        function joinRoom() {
            alert("To Be Announcement");
        }

        function regist() {
            alert("You Have Pre-Registered");
        }

        function coming() {
            alert("Coming Soon");
        }

        function searchFriend() {
            const searchValue = document.getElementById('search').value.toLowerCase();
            const friends = document.querySelectorAll('.friend-item');

            friends.forEach(friend => {
                const name = friend.querySelector('.friend-details strong').textContent.toLowerCase();
                if (name.includes(searchValue)) {
                    friend.style.display = 'flex';
                } else {
                    friend.style.display = 'none';
                }
            });
        }

        function toggleFollow(button) {
            if (button.textContent === "Follow") {
                button.textContent = "Unfollow";
                button.style.backgroundColor = "#F57C00";
            } else {
                button.textContent = "Follow";
                button.style.backgroundColor = "#EF6C00";
            }
        }

        function refreshRecommendations() {
            const friendList = document.getElementById('friendList');
            const newRecommendations = [
                {
                    name: 'Kei',
                    details: 'Game - Pro Player',
                    time: 'Offline'
                },
                {
                    name: 'Syeila',
                    details: 'Bunny',
                    time: 'Offline'
                },
                {
                    name: 'Ado',
                    details: 'Musik - DJ',
                    time: 'Offline'
                },
                {
                    name: 'Zaidan',
                    details: 'Fitness - Athlete',
                    time: 'Offline'
                },
                {
                    name: 'Rezz',
                    details: 'Sea - Forest',
                    time: 'Offline'
                },
                {
                    name: 'An Nisa',
                    details: 'Photography',
                    time: 'OFfline'
                }
            ];

            friendList.innerHTML = '';

            newRecommendations.forEach(friend => {
                const friendItem = document.createElement('li');
                friendItem.classList.add('friend-item');
                friendItem.innerHTML = `
                    <img src="src/0.png" alt="Avatar">
                    <div class="friend-details">
                        <strong>${friend.name}</strong>
                        <span>${friend.details}</span>
                        <span style="color: red;">${friend.time}</span>
                    </div>
                    <div class="friend-actions">
                        <button onclick="followFriend(this, '${friend.name}', '${friend.details}', '${friend.time}')">Follow</button>
                    </div>
                `;
                friendList.appendChild(friendItem);
            });
        }

        function followFriend(button, name, details, time) {
            // Change button text and disable it
            button.textContent = 'Following';
            button.style.backgroundColor = '#BDBDBD';
            button.disabled = true;

            // Add friend to the followed list
            const followedList = document.getElementById('followedList');

            const followedItem = document.createElement('li');
            followedItem.classList.add('followed-item');
            followedItem.innerHTML = `
                <img src="src/0.png" alt="Avatar">
                <div class="friend-details">
                    <strong>${name}</strong>
                    <span>${details}</span>
                    <span style="color: green;">${time}</span>
                </div>
            `;

            followedList.appendChild(followedItem);
        }

        function sendMessage() {
            const input = document.getElementById('userInput');
            const message = input.value.trim();
            if (message) {
                // Tambahkan pesan pengguna ke tampilan
                addMessage(message, 'user');

                // Proses respons chatbot
                const botResponse = getResponse(message);
                if (botResponse) {
                    setTimeout(() => addMessage(botResponse, 'bot'), 500); // Simulasi delay respons
                }

                input.value = '';
            }
        }

        function addMessage(text, type) {
            const chatboxBody = document.getElementById('chatbox-body');
            const div = document.createElement('div');
            div.className = `message ${type}`;
            div.textContent = text;
            chatboxBody.appendChild(div);
            chatboxBody.scrollTop = chatboxBody.scrollHeight; // Scroll ke bawah
        }

        function getResponse(input) {
            // Logika respon chatbot
            input = input.toLowerCase();
            switch (input) {
                case "hallo":
                    return "Hi!";
                case "apa kabar":
                    return "Saya baik, terima kasih! Bagaimana dengan Anda?";
                case "siapa kamu":
                    return "Saya adalah chatbot sederhana yang dibuat menggunakan HTML dan JavaScript.";
                default:
                    return "Maaf, saya tidak mengerti apa yang Anda maksud.";
            }
        }

        const chatboxBody = document.querySelector('.chatbox-body');

        // Fungsi untuk scroll otomatis
        function scrollToBottom() {
            chatboxBody.scrollTop = chatboxBody.scrollHeight;
        }

        // Tambahkan event listener pada tombol kirim
        document.querySelector('.chatbox-footer button').addEventListener('click', () => {
            const input = document.querySelector('.chatbox-footer input');
            if (input.value.trim()) {
                addMessage('user', input.value);
                input.value = '';
                // Simulasikan balasan bot
                setTimeout(() => addMessage('bot', 'Halo, ada yang bisa saya bantu?'), 1000);
            }
        });

        const profiles = [
            {
                name: "Alya Nur Medina",
                bio: "No Bio Yet.",
                img: "alya.jpg",
                social: {
                    twitter: "https://twitter.com/johndoe",
                    linkedin: "https://linkedin.com/in/johndoe",
                    github: "https://github.com/johndoe"
                }
            },
            {
                name: "An Nisa Putri Cendana",
                bio: "No Bio Yet.",
                img: "annisa.jpg",
                social: {
                    twitter: "https://twitter.com/janesmith",
                    linkedin: "https://linkedin.com/in/janesmith",
                    github: "https://github.com/janesmith"
                }
            },
            {
                name: "Muhammad Hidayatullah",
                bio: "No Bio Yet.",
                img: "dayat.jpg",
                social: {
                    twitter: "https://twitter.com/alicejohnson",
                    linkedin: "https://linkedin.com/in/alicejohnson",
                    github: "https://github.com/alicejohnson"
                }
            },
            {
                name: "Muhammad Ade Ramadhani",
                bio: "Keberanian bukanlah ketiadaan rasa takut, tetapi kemampuan untuk mengatasi rasa takut.",
                img: "ade.jpg",
                social: {
                    twitter: "https://twitter.com/alicejohnson",
                    linkedin: "https://linkedin.com/in/alicejohnson",
                    github: "https://github.com/alicejohnson"
                }
            },
            {
                name: "Achmad Fauzil 'Adhim",
                bio: "No Bio Yet.",
                img: "fauzil.jpg",
                social: {
                    twitter: "https://twitter.com/alicejohnson",
                    linkedin: "https://linkedin.com/in/alicejohnson",
                    github: "https://github.com/alicejohnson"
                }
            },
            {
                name: "Zaidannur Muzanni",
                bio: "No Bio Yet.",
                img: "zaidan.jpg",
                social: {
                    twitter: "https://twitter.com/alicejohnson",
                    linkedin: "https://linkedin.com/in/alicejohnson",
                    github: "https://github.com/alicejohnson"
                }
            }
        ];

        function showProfile(index) {
            const profile = profiles[index];
            document.getElementById('profilePic').src = profile.img;
            document.getElementById('profileName').innerText = profile.name;
            document.getElementById('profileBio').innerText = profile.bio;
            document.getElementById('twitterLink').href = profile.social.twitter;
            document.getElementById('linkedinLink').href = profile.social.linkedin;
            document.getElementById('githubLink').href = profile.social.github;
        }


                        
                document.body.addEventListener('click', function() {
                    const backgroundMusic = document.getElementById('backgroundMusic');
                    backgroundMusic.play();
                    backgroundMusic.volume = 0.3; 
                });
        
    </script>
    

</body>
</html>