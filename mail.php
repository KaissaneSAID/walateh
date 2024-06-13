
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}



.containerss {
    text-align: center;
    background: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative;
}

.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
    margin: 0 auto 20px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

h1 {
    font-size: 2em;
    margin-bottom: 10px;
    color: #ff6347;
}


    </style>

<?php require('headertwo.php')?>
<body>

    <div class="containerss">
        <div class="loader"></div>
        <h1>Page en construction</h1>
        <p>Cette page est en cours de construction. Merci de votre patience !</p>
    </div>
<?php require('footer.php')?>

