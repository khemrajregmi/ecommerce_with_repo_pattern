role :app,  %w{suvalaav}
set :use_sudo, true

# require custom config
require_relative('myconfig.rb')

namespace :deploy do

    desc 'Get stuff ready prior to symlinking'
    task :compile_assets do
      on roles(:app), in: :sequence, wait: 1 do
         execute "cp #{deploy_to}/../components/.env.staging.php #{release_path}"
         execute "cp -r #{deploy_to}/../components/vendor #{release_path}"
      end
    end

    after :updated, :compile_assets

end

namespace :ops do

   desc 'Copy non-git ENV specific files to servers.'
   task :put_env_components do
     on roles(:app), in: :sequence, wait: 1 do
        upload! './.env.staging.php', '#{deploy_to}/../components/.env.staging.php'
     end
   end

end