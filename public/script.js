/**
 * Fetch data from our App using our MessageController class
 */
fetch('./message.json').then(response => response.json()).then(data => {

  // Set our message vars
  const body = data.body;
  const created = new Date(data.created);
  const from = data.from;
  const title = data.title;
  const to = data.to;
  const updated = new Date(data.updated);

  // Define our DOM elements
  const $body = document.getElementsByClassName('jsMessage__body')[0];
  const $created = document.getElementsByClassName('jsMessage__created')[0];
  const $from = document.getElementsByClassName('jsMessage__from')[0];
  const $title = document.getElementsByClassName('jsMessage__title')[0];
  const $to = document.getElementsByClassName('jsMessage__to')[0];
  const $updated = document.getElementsByClassName('jsMessage__updated')[0];

  // Give user "nicenames"
  const userMap = {
    312: 'Jane Doe',
    345: 'John Doe',
  };

  // Place data into respective DOM elements
  $body.innerHTML = body;
  $created.innerHTML = created.toLocaleString();
  $from.innerHTML = userMap[from];
  $title.innerHTML = title;
  $to.innerHTML = userMap[to];
  $updated.innerHTML = updated.toLocaleString();

}).catch(error => console.log(error));
