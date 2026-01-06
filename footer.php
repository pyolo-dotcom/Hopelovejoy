<footer class="site-footer">
    <div class="footer-container">
        
        <div class="footer-col logo-section">
            <div class="footer-logo">
                <img src="img/logo.png" alt="Hope Account Specialist Logo">
            </div>
            <h3>Hope Account Specialist</h3>
            <p class="tagline">Making your dreams turn into reality.</p>
        </div>

        <div class="footer-col">
            <h4>Address</h4>
            <p>123 Financial District, Business City, BC 1000 Philippines</p>
        </div>

        <div class="footer-col">
            <h4>Social</h4>
            <p>Follow us on social media for updates and financial tips.</p>
            <div class="social-icons" style="display: flex; justify-content: center; gap: 15px; margin-top: 10px;">
                <a href="#" style="color: #eeb82e; font-size: 1.2rem;"><i class="fab fa-facebook-f"></i></a>
                <a href="#" style="color: #eeb82e; font-size: 1.2rem;"><i class="fab fa-twitter"></i></a>
                <a href="#" style="color: #eeb82e; font-size: 1.2rem;"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" style="color: #eeb82e; font-size: 1.2rem;"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <div class="footer-col">
            <h4>Contact</h4>
            <p>
                Phone: (02) 8123-4567<br>
                Mobile: (+63) 917-123-4567<br>
                Email: info@hopeaccountspecialist.com
            </p>
        </div>

    </div>
</footer>

<style>
    /* Footer General Styling */
.site-footer {
    background-color: #302f2d;
    color: #cccccc;
    padding: 50px 0;
    font-family: Arial, sans-serif;
    margin-top: auto;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    flex-wrap: wrap;
}

/* Column Styling */
.footer-col {
    flex: 1;
    text-align: center;
    min-width: 200px;
    padding: 0 15px;
    margin-bottom: 20px;
}

/* Headings (Address, Social, Contact) */
.footer-col h4 {
    color: #eeb82e;
    font-size: 1.2rem;
    margin-bottom: 15px;
    font-weight: normal;
}

/* Paragraph Text */
.footer-col p {
    font-size: 0.9rem;
    line-height: 1.5;
    color: #cfcfcf;
}

/* Specific Styling for Logo Section (Leftmost) */
.logo-section img {
    width: 100px;
    height: auto;
    margin-bottom: 10px;
    border-radius: 50%;
}

.logo-section h3 {
    color: #eeb82e;
    font-size: 1rem;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 5px;
}

.logo-section .tagline {
    font-size: 0.7rem;
    color: #888;
    font-style: italic;
}

/* Mobile Responsive Styles */
@media screen and (max-width: 768px) {
    .footer-container {
        justify-content: center;
    }

    .footer-col {
        flex: 0 0 50%;
        min-width: 250px;
    }
}

@media screen and (max-width: 480px) {
    .footer-col {
        flex: 0 0 100%;
        min-width: 100%;
    }

    .site-footer {
        padding: 30px 0;
    }
}
</style>

