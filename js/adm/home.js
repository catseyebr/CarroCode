Ext.onReady(function(){
	Ext.QuickTips.init();

    // Menus can be prebuilt and passed by reference
    var dateMenu = new Ext.menu.DateMenu({
        handler: function(dp, date){
            Ext.example.msg('Date Selected', 'You chose {0}.', date.format('M j, Y'));
        }
    });

    var colorMenu = new Ext.menu.ColorMenu({
        handler: function(cm, color){
            Ext.example.msg('Color Selected', 'You chose {0}.', color);
        }
    });

    var store = new Ext.data.ArrayStore({
        fields: ['abbr', 'state'],
        data : Ext.exampledata.states // from states.js
    });

    var combo = new Ext.form.ComboBox({
        store: store,
        displayField: 'state',
        typeAhead: true,
        mode: 'local',
        triggerAction: 'all',
        emptyText: 'Select a state...',
        selectOnFocus: true,
        width: 135,
        getListParent: function() {
            return this.el.up('.x-menu');
        },
        iconCls: 'no-icon'
    });

    var menu = new Ext.menu.Menu({
        id: 'mainMenu',
        style: {
            overflow: 'visible'     // For the Combo popup
        },
        items: [
            combo,                  // A Field in a Menu
            {
                text: 'I like Ext',
                checked: true,       // when checked has a boolean value, it is assumed to be a CheckItem
                checkHandler: onItemCheck
            }, '-', {
                text: 'Radio Options',
                menu: {        // <-- submenu by nested config object
                    items: [
                        // stick any markup in a menu
                        '<b class="menu-title">Choose a Theme</b>',
                        {
                            text: 'Aero Glass',
                            checked: true,
                            group: 'theme',
                            checkHandler: onItemCheck
                        }, {
                            text: 'Vista Black',
                            checked: false,
                            group: 'theme',
                            checkHandler: onItemCheck
                        }, {
                            text: 'Gray Theme',
                            checked: false,
                            group: 'theme',
                            checkHandler: onItemCheck
                        }, {
                            text: 'Default Theme',
                            checked: false,
                            group: 'theme',
                            checkHandler: onItemCheck
                        }
                    ]
                }
            },{
                text: 'Choose a Date',
                iconCls: 'calendar',
                menu: dateMenu // <-- submenu by reference
            },{
                text: 'Choose a Color',
                menu: colorMenu // <-- submenu by reference
            }
        ]
    });

    var tb = new Ext.Toolbar();
    tb.render('toolbar');

    tb.add({
            text:'Button w/ Menu',
            iconCls: 'bmenu',  // <-- icon
            menu: menu  // assign menu by instance
        }, {
            text: 'Users',
            iconCls: 'user',
            menu: {
                xtype: 'menu',
                plain: true,
                items: {
                    xtype: 'buttongroup',
                    title: 'User options',
                    autoWidth: true,
                    columns: 2,
                    defaults: {
                        xtype: 'button',
                        scale: 'large',
                        width: '100%',
                        iconAlign: 'left'
                    },
                    items: [{
                        text: 'User<br/>manager',
                        iconCls: 'edit'
                    },{
                        iconCls: 'add',
                        width: 'auto',
                        tooltip: 'Add user'
                    },{
                        colspan: 2,

                        text: 'Import',
                        scale: 'small'
                    },{
                        colspan: 2,
                        text: 'Who is online?',
                        scale: 'small'
                    }]
                }
            }
        },
        new Ext.Toolbar.SplitButton({
            text: 'Split Button',
            handler: onButtonClick,
            tooltip: {text:'This is a an example QuickTip for a toolbar item', title:'Tip Title'},
            iconCls: 'blist',
            // Menus can be built/referenced by using nested menu config objects
            menu : {
                items: [{
                    text: '<b>Bold</b>', handler: onItemClick
                }, {
                    text: '<i>Italic</i>', handler: onItemClick
                }, {
                    text: '<u>Underline</u>', handler: onItemClick
                }, '-', {
                    text: 'Pick a Color',
                    handler: onItemClick,
                    menu: {
                        items: [
                            new Ext.ColorPalette({
                                listeners: {
                                    select: function(cp, color){
                                        Ext.example.msg('Color Selected', 'You chose {0}.', color);
                                    }
                                }
                            }), '-',
                            {
                                text: 'More Colors...',
                                handler: onItemClick
                            }
                        ]
                    }
                }, {
                    text: 'Extellent!',
                    handler: onItemClick
                }]
            }
        }), '-', {
        text: 'Toggle Me',
        enableToggle: true,
        toggleHandler: onItemToggle,
        pressed: true
    });

    menu.addSeparator();
    // Menus have a rich api for
    // adding and removing elements dynamically
    var item = menu.add({
        text: 'Dynamically added Item'
    });
    // items support full Observable API
    item.on('click', onItemClick);

    // items can easily be looked up
    menu.add({
        text: 'Disabled Item',
        id: 'disableMe'  // <-- Items can also have an id for easy lookup
        // disabled: true   <-- allowed but for sake of example we use long way below
    });
    // access items by id or index
    menu.items.get('disableMe').disable();

    // They can also be referenced by id in or components
    tb.add('-', {
        icon: 'list-items.gif', // icons can also be specified inline
        cls: 'x-btn-icon',
        tooltip: '<b>Quick Tips</b><br/>Icon only button with tooltip'
    }, '-');

    var scrollMenu = new Ext.menu.Menu();
    for (var i = 0; i < 50; ++i){
        scrollMenu.add({
            text: 'Item ' + (i + 1)
        });
    }
    // scrollable menu
    tb.add({
        icon: 'preview.png',
        cls: 'x-btn-text-icon',
        text: 'Scrolling Menu',
        menu: scrollMenu
    });

    // add a combobox to the toolbar
    var combo = new Ext.form.ComboBox({
        store: store,
        displayField: 'state',
        typeAhead: true,
        mode: 'local',
        triggerAction: 'all',
        emptyText:'Select a state...',
        selectOnFocus:true,
        width:135
    });
    tb.addField(combo);

    tb.doLayout();

    // functions to display feedback
    function onButtonClick(btn){
        Ext.example.msg('Button Click','You clicked the "{0}" button.', btn.text);
    }

    function onItemClick(item){
        Ext.example.msg('Menu Click', 'You clicked the "{0}" menu item.', item.text);
    }

    function onItemCheck(item, checked){
        Ext.example.msg('Item Check', 'You {1} the "{0}" menu item.', item.text, checked ? 'checked' : 'unchecked');
    }

    function onItemToggle(item, pressed){
        Ext.example.msg('Button Toggled', 'Button "{0}" was toggled to {1}.', item.text, pressed);
    }


    var myData = [
        ['3m Co',71.72,0.02,0.03,'9/1 12:00am'],
        ['Alcoa Inc',29.01,0.42,1.47,'9/1 12:00am'],
        ['Altria Group Inc',83.81,0.28,0.34,'9/1 12:00am'],
        ['American Express Company',52.55,0.01,0.02,'9/1 12:00am'],
        ['American International Group, Inc.',64.13,0.31,0.49,'9/1 12:00am'],
        ['AT&T Inc.',31.61,-0.48,-1.54,'9/1 12:00am'],
        ['Boeing Co.',75.43,0.53,0.71,'9/1 12:00am'],
        ['Caterpillar Inc.',67.27,0.92,1.39,'9/1 12:00am'],
        ['Citigroup, Inc.',49.37,0.02,0.04,'9/1 12:00am'],
        ['E.I. du Pont de Nemours and Company',40.48,0.51,1.28,'9/1 12:00am'],
        ['Exxon Mobil Corp',68.1,-0.43,-0.64,'9/1 12:00am'],
        ['General Electric Company',34.14,-0.08,-0.23,'9/1 12:00am'],
        ['General Motors Corporation',30.27,1.09,3.74,'9/1 12:00am'],
        ['Hewlett-Packard Co.',36.53,-0.03,-0.08,'9/1 12:00am'],
        ['Honeywell Intl Inc',38.77,0.05,0.13,'9/1 12:00am'],
        ['Intel Corporation',19.88,0.31,1.58,'9/1 12:00am'],
        ['International Business Machines',81.41,0.44,0.54,'9/1 12:00am'],
        ['Johnson & Johnson',64.72,0.06,0.09,'9/1 12:00am'],
        ['JP Morgan & Chase & Co',45.73,0.07,0.15,'9/1 12:00am'],
        ['McDonald\'s Corporation',36.76,0.86,2.40,'9/1 12:00am'],
        ['Merck & Co., Inc.',40.96,0.41,1.01,'9/1 12:00am'],
        ['Microsoft Corporation',25.84,0.14,0.54,'9/1 12:00am'],
        ['Pfizer Inc',27.96,0.4,1.45,'9/1 12:00am'],
        ['The Coca-Cola Company',45.07,0.26,0.58,'9/1 12:00am'],
        ['The Home Depot, Inc.',34.64,0.35,1.02,'9/1 12:00am'],
        ['The Procter & Gamble Company',61.91,0.01,0.02,'9/1 12:00am'],
        ['United Technologies Corporation',63.26,0.55,0.88,'9/1 12:00am'],
        ['Verizon Communications',35.57,0.39,1.11,'9/1 12:00am'],            
        ['Wal-Mart Stores, Inc.',45.45,0.73,1.63,'9/1 12:00am']
    ];
	
	// create the data store
    var store = new Ext.data.ArrayStore({
        fields: [
           {name: 'company'},
           {name: 'price', type: 'float'},
           {name: 'change', type: 'float'},
           {name: 'pctChange', type: 'float'},
           {name: 'lastChange', type: 'date', dateFormat: 'n/j h:ia'}
        ]
    });

    // manually load local data
    store.loadData(myData);
	
	var grid = new Ext.grid.GridPanel({
		region: 'center',
        store: store,
        columns: [
            {id:'company',header: 'Company', width: 160, sortable: true, dataIndex: 'company'},
            {header: 'Price', width: 75, sortable: true, renderer: 'usMoney', dataIndex: 'price'},
            {header: 'Change', width: 75, sortable: true, renderer: change, dataIndex: 'change'},
            {header: '% Change', width: 75, sortable: true, renderer: pctChange, dataIndex: 'pctChange'},
            {header: 'Last Updated', width: 85, sortable: true, renderer: Ext.util.Format.dateRenderer('m/d/Y'), dataIndex: 'lastChange'}
        ],
        stripeRows: true,
        autoExpandColumn: 'company',
        title: 'Array Grid',
        stateful: true,
        stateId: 'grid', 
		closable: true    
    });

   var viewport = new Ext.Viewport({
		layout: 'border',
		items: [
		new Ext.BoxComponent({
			region: 'north',
			height: 80,
			contentEl: 'tb',
		}), {
			region: 'south',
			contentEl: 'south',
			split: true,
			height: 30,
			minSize: 30,
			maxSize: 30,
			collapsible: false,
			margins: '0 0 0 0'
		},
		new Ext.grid.GridPanel({
		region: 'center',
        store: store,
        columns: [
            {id:'company',header: 'Company', width: 160, sortable: true, dataIndex: 'company'},
            {header: 'Price', width: 75, sortable: true, renderer: 'usMoney', dataIndex: 'price'},
            {header: 'Change', width: 75, sortable: true, renderer: change, dataIndex: 'change'},
            {header: '% Change', width: 75, sortable: true, renderer: pctChange, dataIndex: 'pctChange'},
            {header: 'Last Updated', width: 85, sortable: true, renderer: Ext.util.Format.dateRenderer('m/d/Y'), dataIndex: 'lastChange'}
        ],
        stripeRows: true,
        autoExpandColumn: 'company',
        title: 'Array Grid',
        stateful: true,
        stateId: 'grid', 
		closable: true    
    })]
	});
	Ext.get("hideit").on('click', function(){
		var w = Ext.getCmp('west-panel');
		w.collapsed ? w.expand() : w.collapse();
	});
	 /**
     * Custom function used for column renderer
     * @param {Object} val
     */
    function change(val){
        if(val > 0){
            return '<span style="color:green;">' + val + '</span>';
        }else if(val < 0){
            return '<span style="color:red;">' + val + '</span>';
        }
        return val;
    }

    /**
     * Custom function used for column renderer
     * @param {Object} val
     */
    function pctChange(val){
        if(val > 0){
            return '<span style="color:green;">' + val + '%</span>';
        }else if(val < 0){
            return '<span style="color:red;">' + val + '%</span>';
        }
        return val;
    }

    

   

});
