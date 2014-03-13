




<!DOCTYPE html>
<html>
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# object: http://ogp.me/ns/object# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile#">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>lifecare/app/View/Parceirodenegocios/add.ctp at Francisco · eduardonalves/lifecare</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub" />
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png" />
    <meta property="fb:app_id" content="1401488693436528"/>

      <meta content="@github" name="twitter:site" /><meta content="summary" name="twitter:card" /><meta content="eduardonalves/lifecare" name="twitter:title" /><meta content="Contribute to lifecare development by creating an account on GitHub." name="twitter:description" /><meta content="https://0.gravatar.com/avatar/717ee15a5d86c2b8eded5a80adc58e30?d=https%3A%2F%2Fidenticons.github.com%2F7484e6410ba41b4509b0424adf0bd2d2.png&amp;r=x&amp;s=400" name="twitter:image:src" />
<meta content="GitHub" property="og:site_name" /><meta content="object" property="og:type" /><meta content="https://0.gravatar.com/avatar/717ee15a5d86c2b8eded5a80adc58e30?d=https%3A%2F%2Fidenticons.github.com%2F7484e6410ba41b4509b0424adf0bd2d2.png&amp;r=x&amp;s=400" property="og:image" /><meta content="eduardonalves/lifecare" property="og:title" /><meta content="https://github.com/eduardonalves/lifecare" property="og:url" /><meta content="Contribute to lifecare development by creating an account on GitHub." property="og:description" />

    <meta name="hostname" content="github-fe131-cp1-prd.iad.github.net">
    <meta name="ruby" content="ruby 2.1.0p0-github-tcmalloc (87c9373a41) [x86_64-linux]">
    <link rel="assets" href="https://github.global.ssl.fastly.net/">
    <link rel="conduit-xhr" href="https://ghconduit.com:25035/">
    <link rel="xhr-socket" href="/_sockets" />


    <meta name="msapplication-TileImage" content="/windows-tile.png" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="selected-link" value="repo_source" data-pjax-transient />
    <meta content="collector.githubapp.com" name="octolytics-host" /><meta content="collector-cdn.github.com" name="octolytics-script-host" /><meta content="github" name="octolytics-app-id" /><meta content="B3D39D28:2EB0:175A57:53222F84" name="octolytics-dimension-request_id" /><meta content="6483960" name="octolytics-actor-id" /><meta content="ChiCopyleft" name="octolytics-actor-login" /><meta content="79b64920c338bce81d7eb867e48b0be739c4478cc38c92a82d25bb0fa9140b2c" name="octolytics-actor-hash" />
    

    
    
    <link rel="icon" type="image/x-icon" href="https://github.global.ssl.fastly.net/favicon.ico" />

    <meta content="authenticity_token" name="csrf-param" />
<meta content="2qy6hTtFDFViVotw2RnyD9FRl9kkihwPAHsDGPue27A=" name="csrf-token" />

    <link href="https://github.global.ssl.fastly.net/assets/github-f654cc260b59e8ecdd5678001c06ac452ba6bcbc.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://github.global.ssl.fastly.net/assets/github2-aabea6b7d40679e3ee140906f971770ec4ad2e7a.css" media="all" rel="stylesheet" type="text/css" />
    


      <script crossorigin="anonymous" src="https://github.global.ssl.fastly.net/assets/frameworks-9acb89add4e173259bb0e9e81d36276a93db7af4.js" type="text/javascript"></script>
      <script async="async" crossorigin="anonymous" src="https://github.global.ssl.fastly.net/assets/github-c241406f50959f8b355dd88e296ed72ce452e7db.js" type="text/javascript"></script>
      
      <meta http-equiv="x-pjax-version" content="d3f51697c4319b1f78be8e00c7845aa1">

        <link data-pjax-transient rel='permalink' href='/eduardonalves/lifecare/blob/30efdf35a3c8cb45720d9c5b09c706d4e227ca3c/app/View/Parceirodenegocios/add.ctp'>

  <meta name="description" content="Contribute to lifecare development by creating an account on GitHub." />

  <meta content="4490529" name="octolytics-dimension-user_id" /><meta content="eduardonalves" name="octolytics-dimension-user_login" /><meta content="16202372" name="octolytics-dimension-repository_id" /><meta content="eduardonalves/lifecare" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="16202372" name="octolytics-dimension-repository_network_root_id" /><meta content="eduardonalves/lifecare" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/eduardonalves/lifecare/commits/Francisco.atom" rel="alternate" title="Recent Commits to lifecare:Francisco" type="application/atom+xml" />

  </head>


  <body class="logged_in  env-production linux vis-public page-blob">
    <a href="#start-of-content" class="accessibility-aid js-skip-to-content">Skip to content</a>
    <div class="wrapper">
      
      
      
      


      <div class="header header-logged-in true">
  <div class="container clearfix">

    <a class="header-logo-invertocat" href="https://github.com/">
  <span class="mega-octicon octicon-mark-github"></span>
</a>

    
    <a href="/notifications" aria-label="You have no unread notifications" class="notification-indicator tooltipped tooltipped-s" data-gotokey="n">
        <span class="mail-status all-read"></span>
</a>

      <div class="command-bar js-command-bar  in-repository">
          <form accept-charset="UTF-8" action="/search" class="command-bar-form" id="top_search_form" method="get">

<input type="text" data-hotkey="/ s" name="q" id="js-command-bar-field" placeholder="Search or type a command" tabindex="1" autocapitalize="off"
    
    data-username="ChiCopyleft"
      data-repo="eduardonalves/lifecare"
      data-branch="Francisco"
      data-sha="5695bd6f40634bc9cd355001a1ce80ce2c7b7466"
  >

    <input type="hidden" name="nwo" value="eduardonalves/lifecare" />

    <div class="select-menu js-menu-container js-select-menu search-context-select-menu">
      <span class="minibutton select-menu-button js-menu-target" role="button" aria-haspopup="true">
        <span class="js-select-button">This repository</span>
      </span>

      <div class="select-menu-modal-holder js-menu-content js-navigation-container" aria-hidden="true">
        <div class="select-menu-modal">

          <div class="select-menu-item js-navigation-item js-this-repository-navigation-item selected">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" class="js-search-this-repository" name="search_target" value="repository" checked="checked" />
            <div class="select-menu-item-text js-select-button-text">This repository</div>
          </div> <!-- /.select-menu-item -->

          <div class="select-menu-item js-navigation-item js-all-repositories-navigation-item">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" name="search_target" value="global" />
            <div class="select-menu-item-text js-select-button-text">All repositories</div>
          </div> <!-- /.select-menu-item -->

        </div>
      </div>
    </div>

  <span class="help tooltipped tooltipped-s" aria-label="Show command bar help">
    <span class="octicon octicon-question"></span>
  </span>


  <input type="hidden" name="ref" value="cmdform">

</form>
        <ul class="top-nav">
          <li class="explore"><a href="/explore">Explore</a></li>
            <li><a href="https://gist.github.com">Gist</a></li>
            <li><a href="/blog">Blog</a></li>
          <li><a href="https://help.github.com">Help</a></li>
        </ul>
      </div>

    


  <ul id="user-links">
    <li>
      <a href="/ChiCopyleft" class="name">
        <img alt="ChiCopyleft" class=" js-avatar" data-user="6483960" height="20" src="https://avatars2.githubusercontent.com/u/6483960?s=140" width="20" /> ChiCopyleft
      </a>
    </li>

    <li class="new-menu dropdown-toggle js-menu-container">
      <a href="#" class="js-menu-target tooltipped tooltipped-s" aria-label="Create new...">
        <span class="octicon octicon-plus"></span>
        <span class="dropdown-arrow"></span>
      </a>

      <div class="new-menu-content js-menu-content">
      </div>
    </li>

    <li>
      <a href="/settings/profile" id="account_settings"
        class="tooltipped tooltipped-s"
        aria-label="Account settings ">
        <span class="octicon octicon-tools"></span>
      </a>
    </li>
    <li>
      <a class="tooltipped tooltipped-s" href="/logout" data-method="post" id="logout" aria-label="Sign out">
        <span class="octicon octicon-log-out"></span>
      </a>
    </li>

  </ul>

<div class="js-new-dropdown-contents hidden">
  

<ul class="dropdown-menu">
  <li>
    <a href="/new"><span class="octicon octicon-repo-create"></span> New repository</a>
  </li>
  <li>
    <a href="/organizations/new"><span class="octicon octicon-organization"></span> New organization</a>
  </li>


    <li class="section-title">
      <span title="eduardonalves/lifecare">This repository</span>
    </li>
      <li>
        <a href="/eduardonalves/lifecare/issues/new"><span class="octicon octicon-issue-opened"></span> New issue</a>
      </li>
</ul>

</div>


    
  </div>
</div>

      

        



      <div id="start-of-content" class="accessibility-aid"></div>
          <div class="site" itemscope itemtype="http://schema.org/WebPage">
    
    <div class="pagehead repohead instapaper_ignore readability-menu">
      <div class="container">
        

<ul class="pagehead-actions">

    <li class="subscription">
      <form accept-charset="UTF-8" action="/notifications/subscribe" class="js-social-container" data-autosubmit="true" data-remote="true" method="post"><div style="margin:0;padding:0;display:inline"><input name="authenticity_token" type="hidden" value="2qy6hTtFDFViVotw2RnyD9FRl9kkihwPAHsDGPue27A=" /></div>  <input id="repository_id" name="repository_id" type="hidden" value="16202372" />

    <div class="select-menu js-menu-container js-select-menu">
      <a class="social-count js-social-count" href="/eduardonalves/lifecare/watchers">
        4
      </a>
      <span class="minibutton select-menu-button with-count js-menu-target" role="button" tabindex="0" aria-haspopup="true">
        <span class="js-select-button">
          <span class="octicon octicon-eye-unwatch"></span>
          Unwatch
        </span>
      </span>

      <div class="select-menu-modal-holder">
        <div class="select-menu-modal subscription-menu-modal js-menu-content" aria-hidden="true">
          <div class="select-menu-header">
            <span class="select-menu-title">Notification status</span>
            <span class="octicon octicon-remove-close js-menu-close"></span>
          </div> <!-- /.select-menu-header -->

          <div class="select-menu-list js-navigation-container" role="menu">

            <div class="select-menu-item js-navigation-item " role="menuitem" tabindex="0">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <div class="select-menu-item-text">
                <input id="do_included" name="do" type="radio" value="included" />
                <h4>Not watching</h4>
                <span class="description">You only receive notifications for conversations in which you participate or are @mentioned.</span>
                <span class="js-select-button-text hidden-select-button-text">
                  <span class="octicon octicon-eye-watch"></span>
                  Watch
                </span>
              </div>
            </div> <!-- /.select-menu-item -->

            <div class="select-menu-item js-navigation-item selected" role="menuitem" tabindex="0">
              <span class="select-menu-item-icon octicon octicon octicon-check"></span>
              <div class="select-menu-item-text">
                <input checked="checked" id="do_subscribed" name="do" type="radio" value="subscribed" />
                <h4>Watching</h4>
                <span class="description">You receive notifications for all conversations in this repository.</span>
                <span class="js-select-button-text hidden-select-button-text">
                  <span class="octicon octicon-eye-unwatch"></span>
                  Unwatch
                </span>
              </div>
            </div> <!-- /.select-menu-item -->

            <div class="select-menu-item js-navigation-item " role="menuitem" tabindex="0">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <div class="select-menu-item-text">
                <input id="do_ignore" name="do" type="radio" value="ignore" />
                <h4>Ignoring</h4>
                <span class="description">You do not receive any notifications for conversations in this repository.</span>
                <span class="js-select-button-text hidden-select-button-text">
                  <span class="octicon octicon-mute"></span>
                  Stop ignoring
                </span>
              </div>
            </div> <!-- /.select-menu-item -->

          </div> <!-- /.select-menu-list -->

        </div> <!-- /.select-menu-modal -->
      </div> <!-- /.select-menu-modal-holder -->
    </div> <!-- /.select-menu -->

</form>
    </li>

  <li>
  

  <div class="js-toggler-container js-social-container starring-container ">
    <a href="/eduardonalves/lifecare/unstar"
      class="minibutton with-count js-toggler-target star-button starred"
      aria-label="Unstar this repository" title="Unstar eduardonalves/lifecare" data-remote="true" data-method="post" rel="nofollow">
      <span class="octicon octicon-star-delete"></span><span class="text">Unstar</span>
    </a>

    <a href="/eduardonalves/lifecare/star"
      class="minibutton with-count js-toggler-target star-button unstarred"
      aria-label="Star this repository" title="Star eduardonalves/lifecare" data-remote="true" data-method="post" rel="nofollow">
      <span class="octicon octicon-star"></span><span class="text">Star</span>
    </a>

      <a class="social-count js-social-count" href="/eduardonalves/lifecare/stargazers">
        0
      </a>
  </div>

  </li>


        <li>
          <a href="/eduardonalves/lifecare/fork" class="minibutton with-count js-toggler-target fork-button lighter tooltipped-n" title="Fork your own copy of eduardonalves/lifecare to your account" aria-label="Fork your own copy of eduardonalves/lifecare to your account" rel="nofollow" data-method="post">
            <span class="octicon octicon-git-branch-create"></span><span class="text">Fork</span>
          </a>
          <a href="/eduardonalves/lifecare/network" class="social-count">1</a>
        </li>


</ul>

        <h1 itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="entry-title public">
          <span class="repo-label"><span>public</span></span>
          <span class="mega-octicon octicon-repo"></span>
          <span class="author">
            <a href="/eduardonalves" class="url fn" itemprop="url" rel="author"><span itemprop="title">eduardonalves</span></a>
          </span>
          <span class="repohead-name-divider">/</span>
          <strong><a href="/eduardonalves/lifecare" class="js-current-repository js-repo-home-link">lifecare</a></strong>

          <span class="page-context-loader">
            <img alt="Octocat-spinner-32" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
          </span>

        </h1>
      </div><!-- /.container -->
    </div><!-- /.repohead -->

    <div class="container">
      <div class="repository-with-sidebar repo-container new-discussion-timeline js-new-discussion-timeline  ">
        <div class="repository-sidebar clearfix">
            

<div class="sunken-menu vertical-right repo-nav js-repo-nav js-repository-container-pjax js-octicon-loaders">
  <div class="sunken-menu-contents">
    <ul class="sunken-menu-group">
      <li class="tooltipped tooltipped-w" aria-label="Code">
        <a href="/eduardonalves/lifecare/tree/Francisco" aria-label="Code" class="selected js-selected-navigation-item sunken-menu-item" data-gotokey="c" data-pjax="true" data-selected-links="repo_source repo_downloads repo_commits repo_tags repo_branches /eduardonalves/lifecare/tree/Francisco">
          <span class="octicon octicon-code"></span> <span class="full-word">Code</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

        <li class="tooltipped tooltipped-w" aria-label="Issues">
          <a href="/eduardonalves/lifecare/issues" aria-label="Issues" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="i" data-selected-links="repo_issues /eduardonalves/lifecare/issues">
            <span class="octicon octicon-issue-opened"></span> <span class="full-word">Issues</span>
            <span class='counter'>0</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>        </li>

      <li class="tooltipped tooltipped-w" aria-label="Pull Requests">
        <a href="/eduardonalves/lifecare/pulls" aria-label="Pull Requests" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="p" data-selected-links="repo_pulls /eduardonalves/lifecare/pulls">
            <span class="octicon octicon-git-pull-request"></span> <span class="full-word">Pull Requests</span>
            <span class='counter'>0</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>


        <li class="tooltipped tooltipped-w" aria-label="Wiki">
          <a href="/eduardonalves/lifecare/wiki" aria-label="Wiki" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="repo_wiki /eduardonalves/lifecare/wiki">
            <span class="octicon octicon-book"></span> <span class="full-word">Wiki</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>        </li>
    </ul>
    <div class="sunken-menu-separator"></div>
    <ul class="sunken-menu-group">

      <li class="tooltipped tooltipped-w" aria-label="Pulse">
        <a href="/eduardonalves/lifecare/pulse" aria-label="Pulse" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="pulse /eduardonalves/lifecare/pulse">
          <span class="octicon octicon-pulse"></span> <span class="full-word">Pulse</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped tooltipped-w" aria-label="Graphs">
        <a href="/eduardonalves/lifecare/graphs" aria-label="Graphs" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="repo_graphs repo_contributors /eduardonalves/lifecare/graphs">
          <span class="octicon octicon-graph"></span> <span class="full-word">Graphs</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped tooltipped-w" aria-label="Network">
        <a href="/eduardonalves/lifecare/network" aria-label="Network" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-selected-links="repo_network /eduardonalves/lifecare/network">
          <span class="octicon octicon-git-branch"></span> <span class="full-word">Network</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>
    </ul>


  </div>
</div>

              <div class="only-with-full-nav">
                

  

<div class="clone-url open"
  data-protocol-type="http"
  data-url="/users/set_protocol?protocol_selector=http&amp;protocol_type=push">
  <h3><strong>HTTPS</strong> clone URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/eduardonalves/lifecare.git" readonly="readonly">

    <span aria-label="copy to clipboard" class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/eduardonalves/lifecare.git" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>

  

<div class="clone-url "
  data-protocol-type="ssh"
  data-url="/users/set_protocol?protocol_selector=ssh&amp;protocol_type=push">
  <h3><strong>SSH</strong> clone URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="git@github.com:eduardonalves/lifecare.git" readonly="readonly">

    <span aria-label="copy to clipboard" class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="git@github.com:eduardonalves/lifecare.git" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>

  

<div class="clone-url "
  data-protocol-type="subversion"
  data-url="/users/set_protocol?protocol_selector=subversion&amp;protocol_type=push">
  <h3><strong>Subversion</strong> checkout URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/eduardonalves/lifecare" readonly="readonly">

    <span aria-label="copy to clipboard" class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/eduardonalves/lifecare" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>


<p class="clone-options">You can clone with
      <a href="#" class="js-clone-selector" data-protocol="http">HTTPS</a>,
      <a href="#" class="js-clone-selector" data-protocol="ssh">SSH</a>,
      or <a href="#" class="js-clone-selector" data-protocol="subversion">Subversion</a>.
  <span class="help tooltipped tooltipped-n" aria-label="Get help on which URL is right for you.">
    <a href="https://help.github.com/articles/which-remote-url-should-i-use">
    <span class="octicon octicon-question"></span>
    </a>
  </span>
</p>



                <a href="/eduardonalves/lifecare/archive/Francisco.zip"
                   class="minibutton sidebar-button"
                   aria-label="Download eduardonalves/lifecare as a zip file"
                   title="Download eduardonalves/lifecare as a zip file"
                   rel="nofollow">
                  <span class="octicon octicon-cloud-download"></span>
                  Download ZIP
                </a>
              </div>
        </div><!-- /.repository-sidebar -->

        <div id="js-repo-pjax-container" class="repository-content context-loader-container" data-pjax-container>
          


<!-- blob contrib key: blob_contributors:v21:edf8961eaed73482ce99859f38078827 -->

<p title="This is a placeholder element" class="js-history-link-replace hidden"></p>

<a href="/eduardonalves/lifecare/find/Francisco" data-pjax data-hotkey="t" class="js-show-file-finder" style="display:none">Show File Finder</a>

<div class="file-navigation">
  

<div class="select-menu js-menu-container js-select-menu" >
  <span class="minibutton select-menu-button js-menu-target" data-hotkey="w"
    data-master-branch="master"
    data-ref="Francisco"
    role="button" aria-label="Switch branches or tags" tabindex="0" aria-haspopup="true">
    <span class="octicon octicon-git-branch"></span>
    <i>branch:</i>
    <span class="js-select-button">Francisco</span>
  </span>

  <div class="select-menu-modal-holder js-menu-content js-navigation-container" data-pjax aria-hidden="true">

    <div class="select-menu-modal">
      <div class="select-menu-header">
        <span class="select-menu-title">Switch branches/tags</span>
        <span class="octicon octicon-remove-close js-menu-close"></span>
      </div> <!-- /.select-menu-header -->

      <div class="select-menu-filters">
        <div class="select-menu-text-filter">
          <input type="text" aria-label="Find or create a branch…" id="context-commitish-filter-field" class="js-filterable-field js-navigation-enable" placeholder="Find or create a branch…">
        </div>
        <div class="select-menu-tabs">
          <ul>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="branches" class="js-select-menu-tab">Branches</a>
            </li>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="tags" class="js-select-menu-tab">Tags</a>
            </li>
          </ul>
        </div><!-- /.select-menu-tabs -->
      </div><!-- /.select-menu-filters -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="branches">

        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/eduardonalves/lifecare/blob/Eduardo/app/View/Parceirodenegocios/add.ctp"
                 data-name="Eduardo"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="Eduardo">Eduardo</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item selected">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/eduardonalves/lifecare/blob/Francisco/app/View/Parceirodenegocios/add.ctp"
                 data-name="Francisco"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="Francisco">Francisco</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/eduardonalves/lifecare/blob/Henrique/app/View/Parceirodenegocios/add.ctp"
                 data-name="Henrique"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="Henrique">Henrique</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/eduardonalves/lifecare/blob/Wagner/app/View/Parceirodenegocios/add.ctp"
                 data-name="Wagner"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="Wagner">Wagner</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/eduardonalves/lifecare/blob/master/app/View/Parceirodenegocios/add.ctp"
                 data-name="master"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="master">master</a>
            </div> <!-- /.select-menu-item -->
        </div>

          <form accept-charset="UTF-8" action="/eduardonalves/lifecare/branches" class="js-create-branch select-menu-item select-menu-new-item-form js-navigation-item js-new-item-form" method="post"><div style="margin:0;padding:0;display:inline"><input name="authenticity_token" type="hidden" value="2qy6hTtFDFViVotw2RnyD9FRl9kkihwPAHsDGPue27A=" /></div>
            <span class="octicon octicon-git-branch-create select-menu-item-icon"></span>
            <div class="select-menu-item-text">
              <h4>Create branch: <span class="js-new-item-name"></span></h4>
              <span class="description">from ‘Francisco’</span>
            </div>
            <input type="hidden" name="name" id="name" class="js-new-item-value">
            <input type="hidden" name="branch" id="branch" value="Francisco" />
            <input type="hidden" name="path" id="path" value="app/View/Parceirodenegocios/add.ctp" />
          </form> <!-- /.select-menu-item -->

      </div> <!-- /.select-menu-list -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="tags">
        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/eduardonalves/lifecare/tree/1.01/app/View/Parceirodenegocios/add.ctp"
                 data-name="1.01"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="1.01">1.01</a>
            </div> <!-- /.select-menu-item -->
        </div>

        <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

    </div> <!-- /.select-menu-modal -->
  </div> <!-- /.select-menu-modal-holder -->
</div> <!-- /.select-menu -->

  <div class="breadcrumb">
    <span class='repo-root js-repo-root'><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/eduardonalves/lifecare/tree/Francisco" data-branch="Francisco" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">lifecare</span></a></span></span><span class="separator"> / </span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/eduardonalves/lifecare/tree/Francisco/app" data-branch="Francisco" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">app</span></a></span><span class="separator"> / </span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/eduardonalves/lifecare/tree/Francisco/app/View" data-branch="Francisco" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">View</span></a></span><span class="separator"> / </span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/eduardonalves/lifecare/tree/Francisco/app/View/Parceirodenegocios" data-branch="Francisco" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">Parceirodenegocios</span></a></span><span class="separator"> / </span><strong class="final-path">add.ctp</strong> <span aria-label="copy to clipboard" class="js-zeroclipboard minibutton zeroclipboard-button" data-clipboard-text="app/View/Parceirodenegocios/add.ctp" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>


  <div class="commit file-history-tease">
    <img alt="ChiCopyleft" class="main-avatar js-avatar" data-user="6483960" height="24" src="https://0.gravatar.com/avatar/ffaea5f9755807aff83b1c9ba61efd2d?d=https%3A%2F%2Fidenticons.github.com%2F0aa1f214f5a11a65e2170ce5502783de.png&amp;r=x&amp;s=140" width="24" />
    <span class="author"><a href="/ChiCopyleft" rel="author">ChiCopyleft</a></span>
    <time class="js-relative-date" data-title-format="YYYY-MM-DD HH:mm:ss" datetime="2014-03-13T16:57:51-03:00" title="2014-03-13 16:57:51">March 13, 2014</time>
    <div class="commit-title">
        <a href="/eduardonalves/lifecare/commit/30efdf35a3c8cb45720d9c5b09c706d4e227ca3c" class="message" data-pjax="true" title="Correção parceiro de Negócio">Correção parceiro de Negócio</a>
    </div>

    <div class="participation">
      <p class="quickstat"><a href="#blob_contributors_box" rel="facebox"><strong>4</strong> contributors</a></p>
          <a class="avatar tooltipped tooltipped-s" aria-label="ChiCopyleft" href="/eduardonalves/lifecare/commits/Francisco/app/View/Parceirodenegocios/add.ctp?author=ChiCopyleft"><img alt="ChiCopyleft" class=" js-avatar" data-user="6483960" height="20" src="https://0.gravatar.com/avatar/ffaea5f9755807aff83b1c9ba61efd2d?d=https%3A%2F%2Fidenticons.github.com%2F0aa1f214f5a11a65e2170ce5502783de.png&amp;r=x&amp;s=140" width="20" /></a>
    <a class="avatar tooltipped tooltipped-s" aria-label="wagnersantos" href="/eduardonalves/lifecare/commits/Francisco/app/View/Parceirodenegocios/add.ctp?author=wagnersantos"><img alt="wagnersantos" class=" js-avatar" data-user="6493283" height="20" src="https://1.gravatar.com/avatar/bad65e825445f57f6ac9ae0a4f4933cd?d=https%3A%2F%2Fidenticons.github.com%2F24b42e02cef44046c1e6267ebf135051.png&amp;r=x&amp;s=140" width="20" /></a>
    <a class="avatar tooltipped tooltipped-s" aria-label="eduardonalves" href="/eduardonalves/lifecare/commits/Francisco/app/View/Parceirodenegocios/add.ctp?author=eduardonalves"><img alt="eduardonalves" class=" js-avatar" data-user="4490529" height="20" src="https://0.gravatar.com/avatar/717ee15a5d86c2b8eded5a80adc58e30?d=https%3A%2F%2Fidenticons.github.com%2F7484e6410ba41b4509b0424adf0bd2d2.png&amp;r=x&amp;s=140" width="20" /></a>
    <a class="avatar tooltipped tooltipped-s" aria-label="HenriRique" href="/eduardonalves/lifecare/commits/Francisco/app/View/Parceirodenegocios/add.ctp?author=HenriRique"><img alt="HenriRique" class=" js-avatar" data-user="5859435" height="20" src="https://0.gravatar.com/avatar/b3562b266ef62a2eb4bf59ed4926a4aa?d=https%3A%2F%2Fidenticons.github.com%2F9d2fe57b7ba06636d36615a91ebc7376.png&amp;r=x&amp;s=140" width="20" /></a>


    </div>
    <div id="blob_contributors_box" style="display:none">
      <h2 class="facebox-header">Users who have contributed to this file</h2>
      <ul class="facebox-user-list">
          <li class="facebox-user-list-item">
            <img alt="ChiCopyleft" class=" js-avatar" data-user="6483960" height="24" src="https://0.gravatar.com/avatar/ffaea5f9755807aff83b1c9ba61efd2d?d=https%3A%2F%2Fidenticons.github.com%2F0aa1f214f5a11a65e2170ce5502783de.png&amp;r=x&amp;s=140" width="24" />
            <a href="/ChiCopyleft">ChiCopyleft</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="wagnersantos" class=" js-avatar" data-user="6493283" height="24" src="https://1.gravatar.com/avatar/bad65e825445f57f6ac9ae0a4f4933cd?d=https%3A%2F%2Fidenticons.github.com%2F24b42e02cef44046c1e6267ebf135051.png&amp;r=x&amp;s=140" width="24" />
            <a href="/wagnersantos">wagnersantos</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="eduardonalves" class=" js-avatar" data-user="4490529" height="24" src="https://0.gravatar.com/avatar/717ee15a5d86c2b8eded5a80adc58e30?d=https%3A%2F%2Fidenticons.github.com%2F7484e6410ba41b4509b0424adf0bd2d2.png&amp;r=x&amp;s=140" width="24" />
            <a href="/eduardonalves">eduardonalves</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="HenriRique" class=" js-avatar" data-user="5859435" height="24" src="https://0.gravatar.com/avatar/b3562b266ef62a2eb4bf59ed4926a4aa?d=https%3A%2F%2Fidenticons.github.com%2F9d2fe57b7ba06636d36615a91ebc7376.png&amp;r=x&amp;s=140" width="24" />
            <a href="/HenriRique">HenriRique</a>
          </li>
      </ul>
    </div>
  </div>

<div class="file-box">
  <div class="file">
    <div class="meta clearfix">
      <div class="info file-name">
        <span class="icon"><b class="octicon octicon-file-text"></b></span>
        <span class="mode" title="File Mode">executable file</span>
        <span class="meta-divider"></span>
          <span>205 lines (140 sloc)</span>
          <span class="meta-divider"></span>
        <span>6.91 kb</span>
      </div>
      <div class="actions">
        <div class="button-group">
                <a class="minibutton js-update-url-with-hash"
                   href="/eduardonalves/lifecare/edit/Francisco/app/View/Parceirodenegocios/add.ctp"
                   data-method="post" rel="nofollow" data-hotkey="e">Edit</a>
          <a href="/eduardonalves/lifecare/raw/Francisco/app/View/Parceirodenegocios/add.ctp" class="button minibutton " id="raw-url">Raw</a>
            <a href="/eduardonalves/lifecare/blame/Francisco/app/View/Parceirodenegocios/add.ctp" class="button minibutton js-update-url-with-hash">Blame</a>
          <a href="/eduardonalves/lifecare/commits/Francisco/app/View/Parceirodenegocios/add.ctp" class="button minibutton " rel="nofollow">History</a>
        </div><!-- /.button-group -->

            <a class="minibutton danger empty-icon"
               href="/eduardonalves/lifecare/delete/Francisco/app/View/Parceirodenegocios/add.ctp"
               data-method="post" data-test-id="delete-blob-file" rel="nofollow">

          Delete
        </a>
      </div><!-- /.actions -->
    </div>
        <div class="blob-wrapper data type-php js-blob-data">
        <table class="file-code file-diff tab-size-8">
          <tr class="file-code-line">
            <td class="blob-line-nums">
              <span id="L1" rel="#L1">1</span>
<span id="L2" rel="#L2">2</span>
<span id="L3" rel="#L3">3</span>
<span id="L4" rel="#L4">4</span>
<span id="L5" rel="#L5">5</span>
<span id="L6" rel="#L6">6</span>
<span id="L7" rel="#L7">7</span>
<span id="L8" rel="#L8">8</span>
<span id="L9" rel="#L9">9</span>
<span id="L10" rel="#L10">10</span>
<span id="L11" rel="#L11">11</span>
<span id="L12" rel="#L12">12</span>
<span id="L13" rel="#L13">13</span>
<span id="L14" rel="#L14">14</span>
<span id="L15" rel="#L15">15</span>
<span id="L16" rel="#L16">16</span>
<span id="L17" rel="#L17">17</span>
<span id="L18" rel="#L18">18</span>
<span id="L19" rel="#L19">19</span>
<span id="L20" rel="#L20">20</span>
<span id="L21" rel="#L21">21</span>
<span id="L22" rel="#L22">22</span>
<span id="L23" rel="#L23">23</span>
<span id="L24" rel="#L24">24</span>
<span id="L25" rel="#L25">25</span>
<span id="L26" rel="#L26">26</span>
<span id="L27" rel="#L27">27</span>
<span id="L28" rel="#L28">28</span>
<span id="L29" rel="#L29">29</span>
<span id="L30" rel="#L30">30</span>
<span id="L31" rel="#L31">31</span>
<span id="L32" rel="#L32">32</span>
<span id="L33" rel="#L33">33</span>
<span id="L34" rel="#L34">34</span>
<span id="L35" rel="#L35">35</span>
<span id="L36" rel="#L36">36</span>
<span id="L37" rel="#L37">37</span>
<span id="L38" rel="#L38">38</span>
<span id="L39" rel="#L39">39</span>
<span id="L40" rel="#L40">40</span>
<span id="L41" rel="#L41">41</span>
<span id="L42" rel="#L42">42</span>
<span id="L43" rel="#L43">43</span>
<span id="L44" rel="#L44">44</span>
<span id="L45" rel="#L45">45</span>
<span id="L46" rel="#L46">46</span>
<span id="L47" rel="#L47">47</span>
<span id="L48" rel="#L48">48</span>
<span id="L49" rel="#L49">49</span>
<span id="L50" rel="#L50">50</span>
<span id="L51" rel="#L51">51</span>
<span id="L52" rel="#L52">52</span>
<span id="L53" rel="#L53">53</span>
<span id="L54" rel="#L54">54</span>
<span id="L55" rel="#L55">55</span>
<span id="L56" rel="#L56">56</span>
<span id="L57" rel="#L57">57</span>
<span id="L58" rel="#L58">58</span>
<span id="L59" rel="#L59">59</span>
<span id="L60" rel="#L60">60</span>
<span id="L61" rel="#L61">61</span>
<span id="L62" rel="#L62">62</span>
<span id="L63" rel="#L63">63</span>
<span id="L64" rel="#L64">64</span>
<span id="L65" rel="#L65">65</span>
<span id="L66" rel="#L66">66</span>
<span id="L67" rel="#L67">67</span>
<span id="L68" rel="#L68">68</span>
<span id="L69" rel="#L69">69</span>
<span id="L70" rel="#L70">70</span>
<span id="L71" rel="#L71">71</span>
<span id="L72" rel="#L72">72</span>
<span id="L73" rel="#L73">73</span>
<span id="L74" rel="#L74">74</span>
<span id="L75" rel="#L75">75</span>
<span id="L76" rel="#L76">76</span>
<span id="L77" rel="#L77">77</span>
<span id="L78" rel="#L78">78</span>
<span id="L79" rel="#L79">79</span>
<span id="L80" rel="#L80">80</span>
<span id="L81" rel="#L81">81</span>
<span id="L82" rel="#L82">82</span>
<span id="L83" rel="#L83">83</span>
<span id="L84" rel="#L84">84</span>
<span id="L85" rel="#L85">85</span>
<span id="L86" rel="#L86">86</span>
<span id="L87" rel="#L87">87</span>
<span id="L88" rel="#L88">88</span>
<span id="L89" rel="#L89">89</span>
<span id="L90" rel="#L90">90</span>
<span id="L91" rel="#L91">91</span>
<span id="L92" rel="#L92">92</span>
<span id="L93" rel="#L93">93</span>
<span id="L94" rel="#L94">94</span>
<span id="L95" rel="#L95">95</span>
<span id="L96" rel="#L96">96</span>
<span id="L97" rel="#L97">97</span>
<span id="L98" rel="#L98">98</span>
<span id="L99" rel="#L99">99</span>
<span id="L100" rel="#L100">100</span>
<span id="L101" rel="#L101">101</span>
<span id="L102" rel="#L102">102</span>
<span id="L103" rel="#L103">103</span>
<span id="L104" rel="#L104">104</span>
<span id="L105" rel="#L105">105</span>
<span id="L106" rel="#L106">106</span>
<span id="L107" rel="#L107">107</span>
<span id="L108" rel="#L108">108</span>
<span id="L109" rel="#L109">109</span>
<span id="L110" rel="#L110">110</span>
<span id="L111" rel="#L111">111</span>
<span id="L112" rel="#L112">112</span>
<span id="L113" rel="#L113">113</span>
<span id="L114" rel="#L114">114</span>
<span id="L115" rel="#L115">115</span>
<span id="L116" rel="#L116">116</span>
<span id="L117" rel="#L117">117</span>
<span id="L118" rel="#L118">118</span>
<span id="L119" rel="#L119">119</span>
<span id="L120" rel="#L120">120</span>
<span id="L121" rel="#L121">121</span>
<span id="L122" rel="#L122">122</span>
<span id="L123" rel="#L123">123</span>
<span id="L124" rel="#L124">124</span>
<span id="L125" rel="#L125">125</span>
<span id="L126" rel="#L126">126</span>
<span id="L127" rel="#L127">127</span>
<span id="L128" rel="#L128">128</span>
<span id="L129" rel="#L129">129</span>
<span id="L130" rel="#L130">130</span>
<span id="L131" rel="#L131">131</span>
<span id="L132" rel="#L132">132</span>
<span id="L133" rel="#L133">133</span>
<span id="L134" rel="#L134">134</span>
<span id="L135" rel="#L135">135</span>
<span id="L136" rel="#L136">136</span>
<span id="L137" rel="#L137">137</span>
<span id="L138" rel="#L138">138</span>
<span id="L139" rel="#L139">139</span>
<span id="L140" rel="#L140">140</span>
<span id="L141" rel="#L141">141</span>
<span id="L142" rel="#L142">142</span>
<span id="L143" rel="#L143">143</span>
<span id="L144" rel="#L144">144</span>
<span id="L145" rel="#L145">145</span>
<span id="L146" rel="#L146">146</span>
<span id="L147" rel="#L147">147</span>
<span id="L148" rel="#L148">148</span>
<span id="L149" rel="#L149">149</span>
<span id="L150" rel="#L150">150</span>
<span id="L151" rel="#L151">151</span>
<span id="L152" rel="#L152">152</span>
<span id="L153" rel="#L153">153</span>
<span id="L154" rel="#L154">154</span>
<span id="L155" rel="#L155">155</span>
<span id="L156" rel="#L156">156</span>
<span id="L157" rel="#L157">157</span>
<span id="L158" rel="#L158">158</span>
<span id="L159" rel="#L159">159</span>
<span id="L160" rel="#L160">160</span>
<span id="L161" rel="#L161">161</span>
<span id="L162" rel="#L162">162</span>
<span id="L163" rel="#L163">163</span>
<span id="L164" rel="#L164">164</span>
<span id="L165" rel="#L165">165</span>
<span id="L166" rel="#L166">166</span>
<span id="L167" rel="#L167">167</span>
<span id="L168" rel="#L168">168</span>
<span id="L169" rel="#L169">169</span>
<span id="L170" rel="#L170">170</span>
<span id="L171" rel="#L171">171</span>
<span id="L172" rel="#L172">172</span>
<span id="L173" rel="#L173">173</span>
<span id="L174" rel="#L174">174</span>
<span id="L175" rel="#L175">175</span>
<span id="L176" rel="#L176">176</span>
<span id="L177" rel="#L177">177</span>
<span id="L178" rel="#L178">178</span>
<span id="L179" rel="#L179">179</span>
<span id="L180" rel="#L180">180</span>
<span id="L181" rel="#L181">181</span>
<span id="L182" rel="#L182">182</span>
<span id="L183" rel="#L183">183</span>
<span id="L184" rel="#L184">184</span>
<span id="L185" rel="#L185">185</span>
<span id="L186" rel="#L186">186</span>
<span id="L187" rel="#L187">187</span>
<span id="L188" rel="#L188">188</span>
<span id="L189" rel="#L189">189</span>
<span id="L190" rel="#L190">190</span>
<span id="L191" rel="#L191">191</span>
<span id="L192" rel="#L192">192</span>
<span id="L193" rel="#L193">193</span>
<span id="L194" rel="#L194">194</span>
<span id="L195" rel="#L195">195</span>
<span id="L196" rel="#L196">196</span>
<span id="L197" rel="#L197">197</span>
<span id="L198" rel="#L198">198</span>
<span id="L199" rel="#L199">199</span>
<span id="L200" rel="#L200">200</span>
<span id="L201" rel="#L201">201</span>
<span id="L202" rel="#L202">202</span>
<span id="L203" rel="#L203">203</span>
<span id="L204" rel="#L204">204</span>

            </td>
            <td class="blob-line-code"><div class="code-body highlight"><pre><div class='line' id='LC1'><span class="o">&lt;?</span><span class="nx">php</span></div><div class='line' id='LC2'>	<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">start</span><span class="p">(</span><span class="s1">&#39;css&#39;</span><span class="p">);</span></div><div class='line' id='LC3'>		<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Html</span><span class="o">-&gt;</span><span class="na">css</span><span class="p">(</span><span class="s1">&#39;parceiro&#39;</span><span class="p">);</span></div><div class='line' id='LC4'>	<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">end</span><span class="p">();</span></div><div class='line' id='LC5'><br/></div><div class='line' id='LC6'>	<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">start</span><span class="p">(</span><span class="s1">&#39;script&#39;</span><span class="p">);</span></div><div class='line' id='LC7'>		<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Html</span><span class="o">-&gt;</span><span class="na">script</span><span class="p">(</span><span class="s1">&#39;funcoes_parceiro.js&#39;</span><span class="p">);</span></div><div class='line' id='LC8'>	<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">end</span><span class="p">();</span></div><div class='line' id='LC9'><span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC10'><br/></div><div class='line' id='LC11'><span class="x">&lt;script type=&quot;text/javascript&quot; src=&quot;http://cidades-estados-js.googlecode.com/files/cidades-estados-1.2-utf8.js&quot;&gt;&lt;/script&gt;</span></div><div class='line' id='LC12'><span class="x">&lt;script&gt;</span></div><div class='line' id='LC13'><span class="x">	window.onload = function(){</span></div><div class='line' id='LC14'><span class="x">	  new dgCidadesEstados({</span></div><div class='line' id='LC15'><span class="x">		estado: document.getElementById(&#39;Endereco0Uf&#39;),</span></div><div class='line' id='LC16'><span class="x">		cidade: document.getElementById(&#39;Endereco0Cidade&#39;)</span></div><div class='line' id='LC17'><span class="x">	  });</span></div><div class='line' id='LC18'><span class="x">	}</span></div><div class='line' id='LC19'><span class="x">&lt;/script&gt;</span></div><div class='line' id='LC20'><br/></div><div class='line' id='LC21'><span class="x">&lt;header&gt;</span></div><div class='line' id='LC22'><span class="x">    </span><span class="cp">&lt;?php</span> <span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Html</span><span class="o">-&gt;</span><span class="na">image</span><span class="p">(</span><span class="s1">&#39;titulo-cadastrar.png&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s1">&#39;id&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;cadastrar-titulo&#39;</span><span class="p">,</span> <span class="s1">&#39;alt&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Cadastrar&#39;</span><span class="p">,</span> <span class="s1">&#39;title&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Cadastrar&#39;</span><span class="p">));</span> <span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC23'><br/></div><div class='line' id='LC24'><span class="x">    &lt;!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral --&gt;</span></div><div class='line' id='LC25'><span class="x">    &lt;h1 class=&quot;menuOption32&quot;&gt;Cadastrar Parceiro&lt;/h1&gt;</span></div><div class='line' id='LC26'><span class="x">&lt;/header&gt;</span></div><div class='line' id='LC27'><br/></div><div class='line' id='LC28'><span class="x">&lt;section&gt; &lt;!---section superior---&gt;</span></div><div class='line' id='LC29'><br/></div><div class='line' id='LC30'><span class="x">	&lt;header&gt;Dados GeriasParceiro&lt;/header&gt;</span></div><div class='line' id='LC31'><br/></div><div class='line' id='LC32'><span class="x">	&lt;section class=&quot;coluna-esquerda&quot;&gt;</span></div><div class='line' id='LC33'><br/></div><div class='line' id='LC34'><span class="x">		</span><span class="cp">&lt;?php</span></div><div class='line' id='LC35'>			<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">create</span><span class="p">(</span><span class="s1">&#39;Parceirodenegocio&#39;</span><span class="p">);</span></div><div class='line' id='LC36'><br/></div><div class='line' id='LC37'>			<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;tipo&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Classificação:&#39;</span><span class="p">,</span><span class="s1">&#39;options&#39;</span><span class="o">=&gt;</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;&#39;</span><span class="p">,</span><span class="s1">&#39;Cliente&#39;</span><span class="p">,</span><span class="s1">&#39;Fornecedor&#39;</span><span class="p">),</span><span class="s1">&#39;type&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;select&#39;</span><span class="p">,</span><span class="s1">&#39;div&#39;</span> <span class="o">=&gt;</span><span class="k">array</span><span class="p">(</span> <span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;input select&#39;</span><span class="p">)));</span></div><div class='line' id='LC38'>			<span class="cm">/*Corrigir Campo*/</span> <span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;telefone&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-medio&#39;</span><span class="p">,</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Telefone 1:&#39;</span><span class="p">));</span></div><div class='line' id='LC39'>			<span class="cm">/*Corrigir Campo*/</span> <span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;fax&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-medio&#39;</span><span class="p">,</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Fax:&#39;</span><span class="p">));</span></div><div class='line' id='LC40'>		<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC41'><br/></div><div class='line' id='LC42'><span class="x">	&lt;/section&gt;</span></div><div class='line' id='LC43'><br/></div><div class='line' id='LC44'><span class="x">	&lt;section class=&quot;coluna-central&quot; &gt;</span></div><div class='line' id='LC45'><br/></div><div class='line' id='LC46'><span class="x">		</span><span class="cp">&lt;?php</span></div><div class='line' id='LC47'>			<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;nome&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-medio&#39;</span><span class="p">,</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Nome:&#39;</span><span class="p">));</span></div><div class='line' id='LC48'>			<span class="cm">/*Corrigir Campo*/</span> <span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;telefone&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-medio&#39;</span><span class="p">,</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Telefone 2:&#39;</span><span class="p">));</span></div><div class='line' id='LC49'>			<span class="cm">/*Corrigir Campo*/</span> <span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;email&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-medio&#39;</span><span class="p">,</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Email:&#39;</span><span class="p">));</span></div><div class='line' id='LC50'>		<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC51'><br/></div><div class='line' id='LC52'><span class="x">	&lt;/section&gt;</span></div><div class='line' id='LC53'><br/></div><div class='line' id='LC54'><span class="x">	&lt;section class=&quot;coluna-direita&quot; &gt;</span></div><div class='line' id='LC55'><br/></div><div class='line' id='LC56'><span class="x">		</span><span class="cp">&lt;?php</span></div><div class='line' id='LC57'>			<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;cpf_cnpj&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-medio&#39;</span><span class="p">,</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;CPF/CNPJ:&#39;</span><span class="p">));</span></div><div class='line' id='LC58'>			<span class="cm">/*Corrigir Campo*/</span> <span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;celular&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-medio&#39;</span><span class="p">,</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Celular:&#39;</span><span class="p">));</span></div><div class='line' id='LC59'>		<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC60'><br/></div><div class='line' id='LC61'><span class="x">	&lt;/section&gt;</span></div><div class='line' id='LC62'><span class="x">&lt;/section&gt;&lt;!---Fim section superior---&gt;</span></div><div class='line' id='LC63'><br/></div><div class='line' id='LC64'><span class="x">&lt;section class=&quot;ajusteAlignSection&quot;&gt; &lt;!---section MEIO---&gt;</span></div><div class='line' id='LC65'><span class="x">	</span></div><div class='line' id='LC66'><span class="x">	&lt;header class=&quot;&quot;&gt;Endereços&lt;/header&gt;</span></div><div class='line' id='LC67'><span class="x">	</span></div><div class='line' id='LC68'><span class="x">	</span></div><div class='line' id='LC69'><span class="x">	&lt;div class=&quot;area-endereço&quot;&gt; </span></div><div class='line' id='LC70'><span class="x">		&lt;div class=&quot;bloco-area-endereco&quot;&gt;</span></div><div class='line' id='LC71'><span class="x">			</span></div><div class='line' id='LC72'><span class="x">			&lt;section class=&quot;coluna-esquerda&quot;&gt;</span></div><div class='line' id='LC73'><br/></div><div class='line' id='LC74'><span class="x">				</span><span class="cp">&lt;?php</span>	</div><div class='line' id='LC75'>					<span class="cm">/*Corrigir Campo*/</span> <span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;tipo&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Tipo:&#39;</span><span class="p">,</span><span class="s1">&#39;type&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;select&#39;</span><span class="p">,</span><span class="s1">&#39;div&#39;</span> <span class="o">=&gt;</span><span class="k">array</span><span class="p">(</span> <span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;input select&#39;</span><span class="p">)));</span></div><div class='line' id='LC76'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Endereco.0.uf&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;UF&lt;span class=&quot;campo-obrigatorio&quot;&gt;*&lt;/span&gt;:&#39;</span><span class="p">,</span><span class="s1">&#39;type&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;select&#39;</span><span class="p">,</span><span class="s1">&#39;div&#39;</span> <span class="o">=&gt;</span> <span class="k">array</span><span class="p">(</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;inputCliente input text divUf&#39;</span><span class="p">)));</span></div><div class='line' id='LC77'>					<span class="k">echo</span> <span class="s2">&quot;&lt;span id=&#39;spanEndereco0Uf&#39; class=&#39;Msg tooltipMensagemErroDireta&#39; style=&#39;display:none&#39;&gt;Selecione o Estado&lt;/span&gt;&quot;</span><span class="p">;</span></div><div class='line' id='LC78'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Endereco.0. ponto_referencia&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;Ponto de Referência:&#39;</span><span class="p">,</span><span class="s1">&#39;type&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;textarea&#39;</span><span class="p">));</span></div><div class='line' id='LC79'>				<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC80'><br/></div><div class='line' id='LC81'><span class="x">			&lt;/section&gt;</span></div><div class='line' id='LC82'><span class="x">		</span></div><div class='line' id='LC83'><span class="x">			&lt;section class=&quot;coluna-central&quot; &gt;</span></div><div class='line' id='LC84'><br/></div><div class='line' id='LC85'><span class="x">				</span><span class="cp">&lt;?php</span></div><div class='line' id='LC86'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Endereco.0.logradouro&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;Logradouro&lt;span class=&quot;campo-obrigatorio&quot;&gt;*&lt;/span&gt;:&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-medio&#39;</span><span class="p">));</span></div><div class='line' id='LC87'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Endereco.0.cidade&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;Cidade&lt;span class=&quot;campo-obrigatorio&quot;&gt;*&lt;/span&gt;:&#39;</span><span class="p">,</span> <span class="s1">&#39;type&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;select&#39;</span><span class="p">));</span></div><div class='line' id='LC88'>					<span class="k">echo</span> <span class="s2">&quot;&lt;span id=&#39;spanEndereco0Cidade&#39; class=&#39;Msg tooltipMensagemErroDireta&#39; style=&#39;display:none&#39;&gt;Selecione a cidade&lt;/span&gt;&quot;</span><span class="p">;</span></div><div class='line' id='LC89'>				<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC90'><br/></div><div class='line' id='LC91'><span class="x">			&lt;/section&gt;</span></div><div class='line' id='LC92'><br/></div><div class='line' id='LC93'><span class="x">		</span></div><div class='line' id='LC94'><span class="x">			&lt;section class=&quot;coluna-direita&quot; &gt;</span></div><div class='line' id='LC95'><br/></div><div class='line' id='LC96'><span class="x">				</span><span class="cp">&lt;?php</span></div><div class='line' id='LC97'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Endereco.0.complemento&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;Complemento:&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-pequeno&#39;</span><span class="p">));</span></div><div class='line' id='LC98'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Endereco.0.bairro&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;Bairro&lt;span class=&quot;campo-obrigatorio&quot;&gt;*&lt;/span&gt;:&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-pequeno&#39;</span><span class="p">));</span></div><div class='line' id='LC99'>					<span class="k">echo</span> <span class="s2">&quot;&lt;span id=&#39;spanEndereco0Bairro&#39; class=&#39;Msg tooltipMensagemErroDireta&#39; style=&#39;display:none&#39;&gt;Preencha o campo bairro&lt;/span&gt;&quot;</span><span class="p">;</span></div><div class='line' id='LC100'>				<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC101'><br/></div><div class='line' id='LC102'><span class="x">			&lt;/section&gt;</span></div><div class='line' id='LC103'><span class="x">		&lt;/div&gt;	</span></div><div class='line' id='LC104'><span class="x">	&lt;/div&gt;</span></div><div class='line' id='LC105'><span class="x">	</span></div><div class='line' id='LC106'><span class="x">	&lt;div class=&quot;fake-footer&quot;&gt;</span></div><div class='line' id='LC107'><br/></div><div class='line' id='LC108'><span class="x">		</span><span class="cp">&lt;?php</span></div><div class='line' id='LC109'>			<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">html</span><span class="o">-&gt;</span><span class="na">image</span><span class="p">(</span><span class="s1">&#39;botao-add2.png&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;alt&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;Adicionar&#39;</span><span class="p">,</span><span class="s1">&#39;title&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;Adicionar Conta&#39;</span><span class="p">,</span><span class="s1">&#39;id&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;add-area-endereco&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;bt-direita&#39;</span><span class="p">));</span></div><div class='line' id='LC110'>		<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC111'><br/></div><div class='line' id='LC112'><span class="x">	&lt;/div&gt;</span></div><div class='line' id='LC113'><span class="x">&lt;/section&gt;&lt;!--fim Meio--&gt;</span></div><div class='line' id='LC114'><br/></div><div class='line' id='LC115'><span class="x">&lt;section class=&quot;ajusteAlignSection&quot;&gt; &lt;!---section MEIO---&gt;</span></div><div class='line' id='LC116'><br/></div><div class='line' id='LC117'><span class="x">	&lt;header class=&quot;&quot;&gt;Dados Bancários&lt;/header&gt;</span></div><div class='line' id='LC118'><span class="x">	</span></div><div class='line' id='LC119'><span class="x">	&lt;div class=&quot;area-dadosbanc&quot;&gt;</span></div><div class='line' id='LC120'><span class="x">		&lt;div class=&quot;bloco-area-dadosbanc&quot;&gt;</span></div><div class='line' id='LC121'><span class="x">			&lt;section class=&quot;coluna-esquerda&quot;&gt;</span></div><div class='line' id='LC122'><br/></div><div class='line' id='LC123'><span class="x">				</span><span class="cp">&lt;?php</span> </div><div class='line' id='LC124'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadosbancario.nome_banco&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Nome do Banco:&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-medio&#39;</span><span class="p">));</span></div><div class='line' id='LC125'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadosbancario.numero_agencia&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Númeor da Agência:&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-pequeno&#39;</span><span class="p">));</span></div><div class='line' id='LC126'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadosbancario.gerente&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Gerente:&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-pequeno&#39;</span><span class="p">));</span></div><div class='line' id='LC127'>				<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC128'><br/></div><div class='line' id='LC129'><span class="x">			&lt;/section&gt;</span></div><div class='line' id='LC130'><br/></div><div class='line' id='LC131'><span class="x">			&lt;section class=&quot;coluna-central&quot; &gt;</span></div><div class='line' id='LC132'><br/></div><div class='line' id='LC133'><span class="x">				</span><span class="cp">&lt;?php</span></div><div class='line' id='LC134'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadosbancario.numero_banco&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Número do Banco:&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-medio&#39;</span><span class="p">));</span></div><div class='line' id='LC135'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadosbancario.conta&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Conta:&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-pequeno&#39;</span><span class="p">,</span><span class="s1">&#39;id&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;DadosbancarioConta0&#39;</span><span class="p">));</span></div><div class='line' id='LC136'>				<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC137'><br/></div><div class='line' id='LC138'><span class="x">			&lt;/section&gt;</span></div><div class='line' id='LC139'><br/></div><div class='line' id='LC140'><span class="x">			&lt;section class=&quot;coluna-direita&quot; &gt;</span></div><div class='line' id='LC141'><br/></div><div class='line' id='LC142'><span class="x">				</span><span class="cp">&lt;?php</span></div><div class='line' id='LC143'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadosbancario.nome_agencia&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Nome da Agência:&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-pequeno&#39;</span><span class="p">));</span></div><div class='line' id='LC144'>					<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadosbancario.telefone_banco&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Telefone:&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-pequeno&#39;</span><span class="p">));</span></div><div class='line' id='LC145'>				<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC146'><br/></div><div class='line' id='LC147'><span class="x">			&lt;/section&gt;</span></div><div class='line' id='LC148'><span class="x">		&lt;/div&gt;</span></div><div class='line' id='LC149'><span class="x">	&lt;/div&gt;</span></div><div class='line' id='LC150'><span class="x">	</span></div><div class='line' id='LC151'><span class="x">	&lt;div class=&quot;fake-footer&quot;&gt;</span></div><div class='line' id='LC152'><br/></div><div class='line' id='LC153'><span class="x">		</span><span class="cp">&lt;?php</span></div><div class='line' id='LC154'>			<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">html</span><span class="o">-&gt;</span><span class="na">image</span><span class="p">(</span><span class="s1">&#39;botao-add2.png&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;alt&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;Adicionar&#39;</span><span class="p">,</span><span class="s1">&#39;title&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;Adicionar Conta&#39;</span><span class="p">,</span><span class="s1">&#39;id&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;add-area-dadosbanc&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;bt-direita&#39;</span><span class="p">));</span></div><div class='line' id='LC155'>		<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC156'><br/></div><div class='line' id='LC157'><span class="x">	&lt;/div&gt;</span></div><div class='line' id='LC158'><span class="x">&lt;/section&gt;&lt;!--fim Meio--&gt;</span></div><div class='line' id='LC159'><br/></div><div class='line' id='LC160'><span class="x">&lt;section class=&quot;areaCliente&quot;&gt; &lt;!---section Baixo---&gt;	</span></div><div class='line' id='LC161'><br/></div><div class='line' id='LC162'><span class="x">	&lt;header class=&quot;&quot;&gt;Dados do Crédito&lt;/header&gt;</span></div><div class='line' id='LC163'><br/></div><div class='line' id='LC164'><span class="x">	&lt;section class=&quot;coluna-esquerda&quot;&gt;</span></div><div class='line' id='LC165'><br/></div><div class='line' id='LC166'><br/></div><div class='line' id='LC167'><span class="x">		</span><span class="cp">&lt;?php</span></div><div class='line' id='LC168'>			<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadoscredito.limite&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Limite de Crédito:&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-medio&#39;</span><span class="p">));</span></div><div class='line' id='LC169'>			<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadoscredito.bloqueado&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Bloqueado:&#39;</span><span class="p">,</span><span class="s1">&#39;type&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;select&#39;</span><span class="p">));</span></div><div class='line' id='LC170'>		<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC171'><br/></div><div class='line' id='LC172'><br/></div><div class='line' id='LC173'><span class="x">	    </span><span class="cp">&lt;?php</span></div><div class='line' id='LC174'>			<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadoscredito.limite&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Limite de Crédito:&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-medio dinheiro_duasCasas&#39;</span><span class="p">));</span></div><div class='line' id='LC175'>			<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadoscredito.bloqueado&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Bloqueado:&#39;</span><span class="p">,</span><span class="s1">&#39;type&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;select&#39;</span><span class="p">));</span></div><div class='line' id='LC176'>	    <span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC177'><br/></div><div class='line' id='LC178'><span class="x">	&lt;/section&gt;</span></div><div class='line' id='LC179'><br/></div><div class='line' id='LC180'><span class="x">	&lt;section class=&quot;coluna-central&quot; &gt;</span></div><div class='line' id='LC181'><br/></div><div class='line' id='LC182'><span class="x">		</span><span class="cp">&lt;?php</span></div><div class='line' id='LC183'>			<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadoscredito.validade_limite&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Validade do Limitte:&#39;</span><span class="p">,</span><span class="s1">&#39;type&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;text&#39;</span><span class="p">,</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;tamanho-pequeno&#39;</span><span class="p">));</span></div><div class='line' id='LC184'>		<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC185'><br/></div><div class='line' id='LC186'><span class="x">	&lt;/section&gt;</span></div><div class='line' id='LC187'><br/></div><div class='line' id='LC188'><span class="x">	&lt;section class=&quot;coluna-direita&quot; &gt;</span></div><div class='line' id='LC189'><br/></div><div class='line' id='LC190'><span class="x">		</span><span class="cp">&lt;?php</span></div><div class='line' id='LC191'>			<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">input</span><span class="p">(</span><span class="s1">&#39;Dadoscredito.status&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;label&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Status:&#39;</span><span class="p">,</span><span class="s1">&#39;type&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;select&#39;</span><span class="p">));</span></div><div class='line' id='LC192'>		<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC193'><br/></div><div class='line' id='LC194'><span class="x">	&lt;/section&gt;</span></div><div class='line' id='LC195'><span class="x">&lt;/section&gt;	</span></div><div class='line' id='LC196'><br/></div><div class='line' id='LC197'><span class="x">&lt;footer&gt;</span></div><div class='line' id='LC198'><br/></div><div class='line' id='LC199'><span class="x">    </span><span class="cp">&lt;?php</span></div><div class='line' id='LC200'>		<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">submit</span><span class="p">(</span><span class="s1">&#39;botao-salvar.png&#39;</span><span class="p">,</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;class&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;bt-salvar&#39;</span><span class="p">,</span> <span class="s1">&#39;alt&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Salvar&#39;</span><span class="p">,</span> <span class="s1">&#39;title&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;Salvar&#39;</span><span class="p">,</span> <span class="s1">&#39;id&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;bt-salvarParceiro&#39;</span><span class="p">,</span><span class="s1">&#39;controller&#39;</span> <span class="o">=&gt;</span><span class="s1">&#39;Parceirodenegocio&#39;</span><span class="p">,</span><span class="s1">&#39;action&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;add&#39;</span><span class="p">,</span><span class="s1">&#39;view&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;add&#39;</span><span class="p">));</span></div><div class='line' id='LC201'>		<span class="k">echo</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">Form</span><span class="o">-&gt;</span><span class="na">end</span><span class="p">();</span></div><div class='line' id='LC202'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="cp">?&gt;</span><span class="x"></span></div><div class='line' id='LC203'><br/></div><div class='line' id='LC204'><span class="x">&lt;/footer&gt;</span></div></pre></div></td>
          </tr>
        </table>
  </div>

  </div>
</div>

<a href="#jump-to-line" rel="facebox[.linejump]" data-hotkey="l" class="js-jump-to-line" style="display:none">Jump to Line</a>
<div id="jump-to-line" style="display:none">
  <form accept-charset="UTF-8" class="js-jump-to-line-form">
    <input class="linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;" autofocus>
    <button type="submit" class="button">Go</button>
  </form>
</div>

        </div>

      </div><!-- /.repo-container -->
      <div class="modal-backdrop"></div>
    </div><!-- /.container -->
  </div><!-- /.site -->


    </div><!-- /.wrapper -->

      <div class="container">
  <div class="site-footer">
    <ul class="site-footer-links right">
      <li><a href="https://status.github.com/">Status</a></li>
      <li><a href="http://developer.github.com">API</a></li>
      <li><a href="http://training.github.com">Training</a></li>
      <li><a href="http://shop.github.com">Shop</a></li>
      <li><a href="/blog">Blog</a></li>
      <li><a href="/about">About</a></li>

    </ul>

    <a href="/">
      <span class="mega-octicon octicon-mark-github" title="GitHub"></span>
    </a>

    <ul class="site-footer-links">
      <li>&copy; 2014 <span title="0.05910s from github-fe131-cp1-prd.iad.github.net">GitHub</span>, Inc.</li>
        <li><a href="/site/terms">Terms</a></li>
        <li><a href="/site/privacy">Privacy</a></li>
        <li><a href="/security">Security</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
  </div><!-- /.site-footer -->
</div><!-- /.container -->


    <div class="fullscreen-overlay js-fullscreen-overlay" id="fullscreen_overlay">
  <div class="fullscreen-container js-fullscreen-container">
    <div class="textarea-wrap">
      <textarea name="fullscreen-contents" id="fullscreen-contents" class="js-fullscreen-contents" placeholder="" data-suggester="fullscreen_suggester"></textarea>
    </div>
  </div>
  <div class="fullscreen-sidebar">
    <a href="#" class="exit-fullscreen js-exit-fullscreen tooltipped tooltipped-w" aria-label="Exit Zen Mode">
      <span class="mega-octicon octicon-screen-normal"></span>
    </a>
    <a href="#" class="theme-switcher js-theme-switcher tooltipped tooltipped-w"
      aria-label="Switch themes">
      <span class="octicon octicon-color-mode"></span>
    </a>
  </div>
</div>



    <div id="ajax-error-message" class="flash flash-error">
      <span class="octicon octicon-alert"></span>
      <a href="#" class="octicon octicon-remove-close close js-ajax-error-dismiss"></a>
      Something went wrong with that request. Please try again.
    </div>

  </body>
</html>

