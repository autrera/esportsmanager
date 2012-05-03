new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 4,
  interval: 30000,
  width: 'auto',
  height: 300,
  theme: {
    shell: {
      background: '#333333',
      color: '#ffffff'
    },
    tweets: {
      background: '#ffffff',
      color: '#000000',
      links: '#0088cc'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: true,
    behavior: 'all'
  }
}).render().setUser('teamquetzal').start();
