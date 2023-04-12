 
</div>
 <footer>
          <div class="pull-right">
              Designed & Develop By <a href="http://khemrajregmi.com.np/" target="_blank">KRR</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- /gauge.js -->
  </body>
   <script type="text/javascript" src="{{ asset('assets/admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/build/js/custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>
<!-- validator -->
<script src="{{ asset('assets/admin/vendors/validator/validator.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/common_function.js')}}"></script>


<script>
    // initialize the validator function
    validator.message.date = 'not a real date';

    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
    });

    $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        if (submit)
            this.submit();

        return false;
    });
</script>
<!-- /validator -->
    @yield('pageScript')
   

</html>