var conf =
{
    domain: 'domain.ltd',
    server_type: 'socket.io',
    server: '127.0.0.1',
    port: '4000',
    debug: true,
    auto_login: true,
    sound_active: true,
    login_popup: true,
    tools_disabled: true,
    search_case_sensitive: true,
    tools:
    {
        icon: 'ui-icon-wrench'
    },

    options_disabled: true,
    options:
    {
        icon: 'ui-icon-triangle-1-n'
    },

    bar:
    {
        default_expand: false,
        icon_expand: 'ui-icon-arrowthickstop-1-e',
        icon_collapse: 'ui-icon-arrowthickstop-1-w'
    },

    theme_default: 'smoothness',
    themes:
    [
        { name: 'black-tie' },
        { name: 'blitzer' },
        { name: 'cupertino' },
        { name: 'dark-hive' },
        { name: 'dot-luv' },
        { name: 'eggplant' },
        { name: 'excite-bike' },
        { name: 'flick' },
        { name: 'hot-sneaks' },
        { name: 'humanity' },
        { name: 'le-frog' },
        { name: 'mint-choc' },
        { name: 'overcast' },
        { name: 'pepper-grinder' },
        { name: 'redmond' },
        { name: 'south-street' },
        { name: 'start' },
        { name: 'sunny' },
        { name: 'swanky-purse' },
        { name: 'trontastic' },
        { name: 'ui-darkness' },
        { name: 'ui-lightness' },
        { name: 'vader' }
    ],

    lang_default: 'en', //Default selected lang in 'options', for change current language go to script tag in 'index.html'.
    lang:
    [
        {
            text: 'Spanish',
            i18n: 'es'
        },
        {
            text: 'English',
            i18n: 'en'
        },
        {
            text: 'French',
            i18n: 'fr'
        }
    ],

    shortcuts:
    [

    ]
}
