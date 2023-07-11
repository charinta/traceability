  <!-- -------- START FOOTER  ------- -->
  <footer class="footer py-5">
      <div class="container">
      </div>
      @if (!auth()->user() || \Request::is('static-sign-up'))
          <div class="row">
              <div class="col-8 mx-auto text-center footer fixed-bottom py-3">

                  <p class="mb-0 text-secondary">
                      ©
                      <script>
                          document.write(new Date().getFullYear())
                      </script> made with <i class="fa fa-heart"></i> by
                      <a style="color: #252f40;" href="https://www.winteq-astra.co.id/" class="font-weight-bold ml-1"
                          target="_blank">SF WINTEQ</a>
                  </p>
              </div>
          </div>
      @endif
      </div>
  </footer>
  <!-- -------- END FOOTER  ------- -->
