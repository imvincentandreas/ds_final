var memberStation = new Vue({
  el: '#memberStation',
  data: {
    stationInfo: []
  },
  methods: {
    fetchMemberByStation() {
      fetch('api/records/viewmemstation.php')
      .then(response => response.json())
      .then(json => { memberStation.stationInfo = json })
    }
  },
  created() {
    this.fetchMemberByStation();
  }
});
