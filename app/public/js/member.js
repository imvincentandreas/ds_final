var memberInfo = new Vue({
  el: '#memberInfo',
  data: {
    members: []
  },
  methods: {
    fetchMembers() {
      fetch('api/members/viewmembers.php')
      .then(response => response.json())
      .then(json => { memberInfo.members = json })
    }
  },
  created() {
    this.fetchMembers();
  }
});
