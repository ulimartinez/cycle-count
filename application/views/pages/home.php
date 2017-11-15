  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center">Code Igniter 2.0 Skeleton</h1>
      <div class="row center">
        <h5 class="header col s12 light">A modern responsive skeleton based on Material Design and Code Igniter</h5>
      </div>
      <div class="row center">
        <div id="theme-button" class="btn-large waves-effect waves-light"
        onsubmit="darkTheme(); return false;">
          Light Theme
        </div>
      </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center"><a href="https://www.codeigniter.com/userguide2/">Code Igniter</a></h5>

            <p class="light">
              CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications. A Model base class <a href="https://github.com/jamierumbelow/codeigniter-base-model">/core/MY_Model</a> is used from this repo.
            </p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center"><a href="http://materializecss.com/">Materialize Css</a></h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center"><a href="https://jquery.com/">Javascript</a></h5>

            <p class="light">
              We use several javascript libraries to make a responsive website. Using jQuery is a fast, small, and feature-rich JavaScript library. Using jQuery we can make our website responsive through <a href="https://www.w3schools.com/xml/ajax_intro.asp">AJAX</a> (Asynchronous JavaScript And XML) and <a href="http://ned.im/noty/#/">Noty</a> a dependency-free notification library.
            </p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>
  <?php
  $needToResetPassword = $this->session->userdata('resetPassword');
  if ($needToResetPassword) {
    ?>
    <script>
      window.onload = function WindowLoad(event) {
        notyPrompt('info', 'Please change your password', '<?php echo base_url('user/setPassword')?>');
      }
    </script>
    <?php
  }
  ?>