  <section id="contact" class="wrapper style1 align-center">

    <div class="inner">
      <section>
          <header>
            <h3>Contact</h3>
          </header>
          <div class="content">


            <form method="post" action="/contact/send-mail">
              @csrf
              <div class="fields">
                <div class="field">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" value="">
                </div>


                <div class="field half">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" value="">
                </div>
                <div class="field half">
                  <label for="email">Phone</label>
                  <input type="text" name="phone" id="phone" value="">
                </div>
                <div class="field">
                  <label for="department">Department</label>
                  <select name="department" id="department">
                    <option value="">- Category -</option>
                    <option value="1">Billing</option>
                    <option value="2">Logistics</option>
                    <option value="3">Farms</option>
                    <option value="4">Other</option>
                  </select>
                </div>

                <div class="field third">
                  <input type="radio" id="priority-low" name="priority" checked="">
                  <label for="priority-low">Low Priority</label>
                </div>
                <div class="field third">
                  <input type="radio" id="priority-normal" name="priority">
                  <label for="priority-normal">Normal Priority</label>
                </div>
                <div class="field third">
                  <input type="radio" id="priority-high" name="priority">
                  <label for="priority-high">High Priority</label>
                </div>
                <div class="field">
                  <label for="message">Message</label>
                  <textarea name="message" id="message" rows="6"></textarea>
                </div>
                <div class="field half">
                  <input type="checkbox" id="copy" name="copy">
                  <label for="copy">Email me a copy of this message</label>
                </div>
                <div class="field half">
                  <input type="checkbox" id="human" name="human" >
                  <label for="human">I am a human and not a robot</label>
                </div>
              </div>
              <ul class="actions">
                <li><input type="submit" name="submit" id="submit" value="Send Message"></li>
              </ul>
            </form>

          </div>
        </section>

    </div>
  </section>
