<div class="ui grid">
  <div class="ten wide column">
    <div class="ui form segment">
      <h2 class="ui dividing header">Send Email To Admin</h2>
      <div class="field">
        <label>Subject</label>
        
        <div class="field">
          <input type="text" name="subject" placeholder="Why you want to contact wiht us">
        </div>
        
      </div>

      <div class="field">
        <label>Phone</label>
        <input type="text" name="phone">
      </div>

      <div class="field">
        <label>Address</label>
        <input type="text" name="address">
      </div>

      
      <div class="field">
        <label>Message</label>
        <textarea></textarea>
      </div>
      

      <div class="ui submit button">Send Email</div>
    </div>
  </div>



  <div class="six wide column">
    <p class="ui segment" ng-include="<?=base_url()?>coustomer/howToUse"</p>
  </div>

</div>