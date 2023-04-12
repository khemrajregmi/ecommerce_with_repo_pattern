set :application, 'suvalaav'
set :repo_url, 'git@bitbucket.org:suvalav/suvalaav.git'

set :deploy_to, '/var/www/html/suvalaav/deploy'

components_dir = '/var/www/html/suvalaav/components'
set :components_dir, components_dir

# Devops command
namespace :ops do

  desc "Copy non git files to Server"
  task :put_components do
  	on roles(:app), in: :sequence, wait: 1 do 
  		 system("tar -zcf ./build/vendor.tar.gz ./vendor ")
          upload! './build/vendor/tar/gz', "#{components_dir}", :recursive => true
          execute "cd #{components_dir}
          tar -zxf /var/www/application/components/vendor.tar.gz"
  	end
  	
  end

end
